<?php
namespace App\Helpers\Theme;

use Illuminate\Filesystem\Filesystem;
use Illuminate\View\FileViewFinder;
use Illuminate\View\ViewFinderInterface;
use InvalidArgumentException;
use Theme;

class ThemeViewFinder extends FileViewFinder implements ViewFinderInterface
{

    public function __construct(Filesystem $files, array $paths, array $extensions = null)
    {
        parent::__construct($files, $paths, $extensions);
    }

    /*
     * Override findNamespacedView() to add "theme/view/vendor/..." paths
     *
     * @param  string  $name
     * @return string
     */
    protected function findNamespacedView($name)
    {
        // Extract the $view and the $namespace parts
        list($namespace, $view) = $this->parseNamespaceSegments($name);

        // Add possible view folders based of the route
        if (count($this->hints[$namespace]) < 8) {
            $hintPath = $this->hints[$namespace][0];
            $this->prependNamespace($namespace, $hintPath . '/' . $this->getDefaultFolder());
            $this->prependNamespace($namespace, $hintPath . '/' . $this->getViewFolder());
            $this->prependNamespace($namespace, resource_path('views/vendor/') . $namespace);
            $this->prependNamespace($namespace, resource_path('views/vendor/') . $namespace . '/' . $this->getDefaultFolder());
            $this->prependNamespace($namespace, resource_path('views/vendor/') . $namespace . '/' . $this->getViewFolder());
            $this->prependNamespace($namespace, public_path(app('theme')->path() . '/views/vendor/' . $namespace));
            $this->prependNamespace($namespace, public_path(app('theme')->path() . '/views/vendor/' . $namespace . '/' . $this->getDefaultFolder()));
            $this->prependNamespace($namespace, public_path(app('theme')->path() . '/views/vendor/' . $namespace . '/' . $this->getViewFolder()));

        }
        return $this->findInPaths($view, $this->hints[$namespace]);
    }

    /**
     * Find the given view in the list of paths.
     *
     * @param  string  $name
     * @param  array   $paths
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    protected function findInPaths($name, $paths)
    {

        $location = public_path(app('theme')->path() . '/views');
        array_unshift($paths, $location);

        foreach ((array) $paths as $path) {

            if (!$this->files->exists($path)) {
                continue;
            }

            foreach ($this->getPossibleViewFiles($name) as $file) {

                if ($this->files->exists($viewPath = $path . '/' . $file)) {
                    return $viewPath;
                }

            }

        }

        throw new InvalidArgumentException("View [$name] not found.");
    }

    /**
     * Return folder for current guard.
     *
     * @return type
     *
     */
    private function getViewFolder()
    {
        $guard = substr(getenv('guard'), 0, strpos(getenv('guard'), '.'));
        return config("theme.themes." . $guard . ".view", config('theme.themes.default.view', $guard));
    }

    /**
     * Return default folder for current guard.
     *
     * @return type
     *
     */
    private function getDefaultFolder()
    {
        $guard = substr(getenv('guard'), 0, strpos(getenv('guard'), '.'));
        return config("theme.themes." . $guard . ".default", config('theme.themes.default.default', 'default'));
    }

}
