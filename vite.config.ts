import { unlink, existsSync } from 'fs'
import * as path from 'path'
import copy from 'rollup-plugin-copy'
import pluginManifest, {
  KeyValueDecorator,
  OutputManifestParam,
} from 'rollup-plugin-output-manifest'
import { ConfigEnv, defineConfig, loadEnv, UserConfigExport } from 'vite'

const { default: outputManifest } = pluginManifest as any
const publicDir = 'public'
const manifestFile = 'manifest.json'
const assets = {
  base: 'resources',
  scripts: 'resources/scripts',
  styles: 'resources/styles',
  images: 'resources/images',
  icons: 'resources/images/icons',
  fonts: 'resources/fonts',
}

const formatName = (name: string): string =>
  name.replace(`${assets.scripts}/`, '').replace(/.css$/gm, '')

export default defineConfig(({ mode }: ConfigEnv) => {
  const devServerConfig = loadEnv(mode, process.cwd(), 'HMR')
  const dev = mode === 'development'
  const config: UserConfigExport = {
    appType: 'custom',
    publicDir: false,
    base: './',
    resolve: {
      alias: {
        '@': path.resolve(__dirname, assets.base),
        '@scripts': path.resolve(__dirname, assets.scripts),
        '@styles': path.resolve(__dirname, assets.styles),
        '@fonts': path.resolve(__dirname, assets.fonts),
        '@images': path.resolve(__dirname, assets.images),
        '@icons': path.resolve(__dirname, assets.icons),
      },
    },
    css: {
      devSourcemap: true,
    },
    build: {
      manifest: true,
      outDir: `${publicDir}`,  // Ensure this is aligned with where Sage is looking
      assetsDir: '',           // Assets will be in 'public/' directly
      rollupOptions: {
        input: {
          main: path.resolve(__dirname, `${assets.scripts}/app.js`), // main.js for Sage
          editor: path.resolve(__dirname, `${assets.scripts}/editor.js`),
        },
        output: {
          entryFileNames: `assets/[name].js`,
          chunkFileNames: `assets/[name].js`,
          assetFileNames: `assets/[name].[ext]`,
        },
        plugins: [
          outputManifest({
            fileName: manifestFile,  // `manifest.json` in `public/`
            generate: (
              keyValueDecorator: KeyValueDecorator,
              seed: object,
              opt: OutputManifestParam
            ) => chunks =>
              chunks.reduce((manifest, { name, fileName }) => {
                return name
                  ? {
                      ...manifest,
                      ...keyValueDecorator(formatName(name), fileName, opt),
                    }
                  : manifest
              }, seed),
          }),
          outputManifest({
            fileName: 'entrypoints.json',
            nameWithExt: true,
            generate: (_: KeyValueDecorator, seed: object) => chunks =>
              chunks.reduce((manifest, { name, fileName }) => {
                const formatedName = name && formatName(name)
                const output = {}
                const js: Array<string> =
                  formatedName && manifest[formatedName]?.js?.length
                    ? manifest[formatedName].js
                    : []
                const css: Array<string> =
                  formatedName && manifest[formatedName]?.css?.length
                    ? manifest[formatedName].css
                    : []
                const dependencies: Array<string> =
                  formatedName && manifest[formatedName] ? manifest[formatedName].dependencies : []
                const inject = {
                  js,
                  css,
                  dependencies,
                }

                fileName.match(/.js$/gm) && js.push(fileName)
                fileName.match(/.css$/gm) && css.push(fileName)

                name && (output[formatedName] = inject)

                return {
                  ...manifest,
                  ...output,
                }
              }, seed),
          }),
          copy({
            copyOnce: true,
            hook: 'writeBundle',
            targets: [
              {
                src: path.resolve(__dirname, `${assets.base}/images/**/*`),
                dest: `${publicDir}/images`,
              },
              {
                src: path.resolve(__dirname, `${assets.base}/svg/**/*`),
                dest: `${publicDir}/svg`,
              },
              {
                src: path.resolve(__dirname, `${assets.base}/fonts/**/*`),
                dest: `${publicDir}/fonts`,
              },
            ],
          }),
        ],
      },
    },
  }

  if (dev) {
    let host = 'localhost'
    let port = 3000
    const protocol = 'http'
    const https = !!(devServerConfig.HMR_HTTPS_KEY && devServerConfig.HMR_HTTPS_CERT)

    // Only unlink if the file exists to avoid errors
    if (existsSync(`${publicDir}/${manifestFile}`)) {
      unlink(`${publicDir}/${manifestFile}`, error =>
        console.log(
          `🧹 Wipe ${manifestFile} :`,
          error ? `Error deleting ${manifestFile}` : '✅',
        ),
      )
    }

    devServerConfig.HMR_HOST && (host = devServerConfig.HMR_HOST)
    devServerConfig.HMR_PORT && (port = parseInt(devServerConfig.HMR_PORT))

    https &&
      (config.server.https = {
        key: devServerConfig.HMR_HTTPS_KEY,
        cert: devServerConfig.HMR_HTTPS_CERT,
      })

    config.server = {
      host: 'localhost',
      port,
      strictPort: true,
      origin: `${protocol}://${host}:${port}`,
      fs: {
        strict: true,
        allow: ['node_modules', assets.base],
      },
      watch: {
        usePolling: true,
        interval: 1000,
      },
    }
  }

  return config
})
