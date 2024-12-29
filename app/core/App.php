<?php

class App{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];


    public function __construct(){
       
        $url = $this->parseURL();
        // var_dump($url);

       
// controller jika http://localhost/webunpas/phpmvc/public/
        if (is_null($url)) {
            $url[0] = $this->controller;
        }

         // controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
            // var_dump($url);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        if (isset($url[1])) {
           if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
                // var_dump($url);
            }
            
        }


        // params
        if (!empty($url)) {
            $this->params = array_values($url);
            // var_dump($this->params);
            
        }

        // jalankan controller dan method, serta kirimkan params jika ada
       call_user_func_array([$this->controller, $this->method], $this->params);
        // var_dump($this->controller);
        // var_dump($this->method);
        // var_dump($this->params);

    
    }

    public function parseURL()
    {
        // Memeriksa apakah parameter 'url' tersedia di query string
        if (isset($_GET['url'])) {
            // Menghapus tanda slash '/' di akhir URL untuk menjaga konsistensi
            $url = rtrim($_GET['url'], '/');

            // Membersihkan URL dari karakter yang tidak valid untuk menghindari error atau celah keamanan
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // Memecah string URL berdasarkan tanda slash '/' menjadi sebuah array
            $url = explode('/', $url);

            // Mengembalikan array hasil pemrosesan URL
            return $url;
        }
    }


}