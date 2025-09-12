import Alpine from "./plugins/alpine.js";
import directives from './directives';

/**
 * Transforms a camelCase string to kebab-case.
 *
 * @param string
 * @returns {string}
 */
export function camelToKebab(string) {
    return string.replace(/([a-z0-9])([A-Z])/g, '$1-$2').toLowerCase();
}

/**
 * Asynchronously loads all directives that are present in the DOM in parallel.
 *
 * @returns {Promise<void>}
 */
async function loadDirectives() {
    const loadPromises = [];

    for (const [name, directiveLoader] of Object.entries(directives)) {
        const directiveName = camelToKebab(name);

        if (document.querySelector(`[x-${directiveName}]`)) {
            loadPromises.push(
                directiveLoader().catch(e =>
                    console.error(`Error while loading directive: ${name}:`, e)
                )
            );
        }
    }

    await Promise.all(loadPromises);
}

document.addEventListener('DOMContentLoaded', async () => {
    await loadDirectives();
    Alpine.start();
});
