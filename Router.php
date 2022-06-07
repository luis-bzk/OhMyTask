<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function checkRoutes()
    {
      // protect Routes...
      session_start();

      // Protected Routes array...
      // $protected_routes = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];

      // $auth = $_SESSION['login'] ?? null;

      $currentUrl = ($_SERVER['REQUEST_URI'] === '') ? '/' : $_SERVER['REQUEST_URI'];
      $method = $_SERVER['REQUEST_METHOD'];

      //divide the url
      $splitUrl = explode('?', $currentUrl);


      if ($method === 'GET') {
        $fn = $this->getRoutes[$splitUrl[0]] ?? null;
      } else {
        $fn = $this->postRoutes[$splitUrl[0]] ?? null;
      }


      if ($fn) {
        // Call user fn va a llamar una función cuando no sabemos cual sera
        $fn($this); // This is for pass arguments
      } else {
        //echo "Páge not found. 404";
        header("Location: /404");
      }
    }

    public function render($view, $datos = [])
    {

        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
          $$key = $value;
          // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // include view on layout
        include_once __DIR__ . "/views/$view.php";
        $content = ob_get_clean(); // Clean Buffer
        include_once __DIR__ . '/views/layout.php';
    }
}