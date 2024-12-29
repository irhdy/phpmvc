<?php

class About extends Controller {

    public function index($nama ='irhdy', $pekerjaan = 'programmer', $umur = 32) {
        // echo "Halo, nama saya $nama, saya adalah seorang $pekerjaan, saya berumur $umur Tahun.";
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About Me';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page() {
        // echo 'About/page';
        $data['judul'] = 'Pages';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}