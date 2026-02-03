# Tailwind CSS Migration - CDN to Local Installation

## Overview
This project has been migrated from Tailwind CSS CDN to a local installation using Tailwind CSS v4 with Vite.

## What Changed

### 1. **Removed CDN References**
The following files were updated to remove the Tailwind CDN script tag:
- `resources/views/layouts/app.blade.php`
- `resources/views/home.blade.php`
- `resources/views/auth/register.blade.php`

**Before:**
```html
<script src="https://cdn.tailwindcss.com"></script>
```

**After:**
```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

### 2. **Updated Configuration**
- **Tailwind v4** uses CSS-based configuration instead of JavaScript config files
- Custom theme colors are now defined in `resources/css/app.css` using CSS variables
- The inline Tailwind config from `register.blade.php` has been moved to the CSS file

### 3. **Custom Theme Colors**
The following custom colors are available:
- `--color-primary`: #339933
- `--color-primary-light`: #4CAF50
- `--color-primary-dark`: #2E7D32
- `--color-primary-green`: #339933

These can be used with utility classes:
- `.text-primary`, `.bg-primary`
- `.text-primary-green`, `.bg-primary-green`
- `.border-primary-green`

## Development Workflow

### Running Development Server
```bash
npm run dev
```
This starts Vite's development server with hot module replacement (HMR).

### Building for Production
```bash
npm run build
```
This compiles and minifies your CSS and JS files to `public/build/assets/`.

## File Structure

```
bisindo-web/
├── resources/
│   ├── css/
│   │   └── app.css          # Tailwind imports + custom theme
│   ├── js/
│   │   └── app.js           # JavaScript entry point
│   └── views/               # Blade templates (now use @vite directive)
├── public/
│   └── build/               # Compiled assets (generated)
│       └── assets/
│           ├── app-*.css    # Compiled CSS
│           └── app-*.js     # Compiled JS
├── package.json             # Dependencies (Tailwind v4)
└── vite.config.js          # Vite configuration
```

## Benefits of Local Installation

1. **Better Performance**: No external CDN dependency, faster load times
2. **Offline Development**: Work without internet connection
3. **Production Optimization**: Purged CSS, smaller file sizes
4. **Version Control**: Locked Tailwind version for consistency
5. **Custom Configuration**: Full control over theme and plugins
6. **Build-time Processing**: PostCSS plugins, autoprefixer, etc.

## Important Notes

- Always run `npm run dev` during development for live reloading
- Run `npm run build` before deploying to production
- The `@vite` directive automatically handles asset versioning and cache busting
- CSS linter warnings about `@theme` are expected (Tailwind v4 feature)

## Troubleshooting

### Styles not loading?
1. Make sure you've run `npm install`
2. Run `npm run build` or `npm run dev`
3. Clear browser cache
4. Check that `@vite` directive is present in your blade templates

### Build errors?
1. Delete `node_modules` and `package-lock.json`
2. Run `npm install` again
3. Try `npm run build` again

## Next Steps

Consider adding:
- Additional custom utilities in `app.css`
- Tailwind plugins (forms, typography, etc.)
- Custom components using `@layer components`
