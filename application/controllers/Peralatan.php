<?php

class Peralatan extends CI_Controller
{
    public function __construct() 
    { 
        parent::__construct(); 
        cek_login(); 
    }
    public function kategori()
    {
        $data['judul'] = 'Kategori Peralatan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelPeralatan->getKategori()->result_array();
        $this->form_validation->set_rules('kategori', 'Kategori',
        'required', [
        'required' => 'Kategori Buku harus diisi'
        ]);
    
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peralatan/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kategori' => $this->input->post('kategori', TRUE)
            ];

            $this->ModelPeralatan->simpanKategori($data);
            redirect('peralatan/kategori');
        }
    }
    
    public function hapusKategori()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelPeralatan->hapusKategori($where);
        redirect('peralatan/kategori');
    }

    public function ubahKategori()
    {
        $data['judul'] = 'Ubah Data Kategori';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelPeralatan->kategoriWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('kategori', 'Nama Kategori', 'required|min_length[3]', [
            'required' => 'Nama Kategori harus diisi', 
            'min_length' => 'Nama Kategori Terlalu Pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Peralatan/ubah_kategori', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'kategori' => $this->input->post('kategori', TRUE)
            ];

            $this->ModelPeralatan->updateKategori(['id' => $this->input->post('id')], $data);
            redirect('Peralatan/kategori');
        }

    }
    //manajemen Peralatan
    public function index() 
    { 
        $data['judul'] = 'Data peralatan'; 
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['peralatan'] = $this->ModelPeralatan->getperalatan()->result_array(); 
        $data['kategori'] = $this->ModelPeralatan->getKategori()->result_array(); 
        
        $this->form_validation->set_rules('nama_alat', 'nama alat', 'required|min_length[3]', 
        [ 
            'required' => 'nama alat harus diisi', 
            'min_length' => 'nama alat terlalu pendek' 
        ]); 
        $this->form_validation->set_rules('tahun', 'Tahun Terbit', 'required|min_length[3]|max_length[4]|numeric', 
        [ 
            'required' => 'Tahun terbit harus diisi', 
            'min_length' => 'Tahun terbit terlalu pendek', 
            'max_length' => 'Tahun terbit terlalu panjang', 
            'numeric' => 'Hanya boleh diisi angka' 
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric', 
        [ 
            'required' => 'Stok harus diisi', 
            'numeric' => 'Yang anda masukan bukan angka' 
        ]); 
        
        //konfigurasi sebelum gambar diupload 
        $config['upload_path'] = './assets/img/upload/'; 
        $config['allowed_types'] = 'jpg|png|jpeg'; 
        $config['max_size'] = '30000'; 
        $config['max_width'] = '10240'; 
        $config['max_height'] = '10000'; 
        $config['file_name'] = 'img' . time(); 
        
        $this->load->library('upload', $config); 
        
        if ($this->form_validation->run() == false) { 
            $this->load->view('templates/header', $data); 
            $this->load->view('templates/sidebar', $data); 
            $this->load->view('templates/topbar', $data); 
            $this->load->view('peralatan/index', $data); 
            $this->load->view('templates/footer'); 
        } else { 
            if ($this->upload->do_upload('image')) { 
                $image = $this->upload->data(); 
                $gambar = $image['file_name']; 
            } else { 
                $gambar = ''; 
            } 
            
            $data = [ 
                'nama_alat' => $this->input->post('nama_alat', true), 
                'id_kategori' => $this->input->post('id_kategori', true), 
                'tahun_buat' => $this->input->post('tahun', true), 
                'stok' => $this->input->post('stok', true),
                'dipinjam' => 0, 
                'dibooking' => 0, 
                'image' => $gambar 
            ]; 
            
            $this->ModelPeralatan->simpanperalatan($data); redirect('peralatan'); 
        } 
    } 

    public function ubahPeralatan()
    { 
        $data['judul'] = 'Ubah Data Peralatan'; 
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(); 
        $data['peralatan'] = $this->ModelPeralatan->peralatanWhere(['id' => $this->uri->segment(3)])->result_array();
        $kategori = $this->ModelPeralatan->joinKategoriperalatan(['peralatan.id' => 
    $this->uri->segment(3)])->result_array(); 
        foreach ($kategori as $k) { 
            $data['id'] = $k['id_kategori']; 
            $data['k'] = $k['kategori']; 
        } 
        $data['kategori'] = $this->ModelPeralatan->getKategori()->result_array(); 
        
        $this->form_validation->set_rules('nama_Alat', 'nama 
    Alat', 'required|min_length[3]', [ 
        'required' => 'nama alat harus diisi', 
        'min_length' => 'nama alat terlalu pendek' 
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun Buat', 
    'required|min_length[3]|max_length[4]|numeric', [ 
            'required' => 'Tahun buat harus diisi', 
            'min_length' => 'Tahun buat terlalu pendek', 
            'max_length' => 'Tahun buat terlalu panjang', 
            'numeric' => 'Hanya boleh diisi angka' 
        ]); 
        $this->form_validation->set_rules('stok', 'Stok', 
    'required|numeric', [ 
        'required' => 'Stok harus diisi', 
        'numeric' => 'Yang anda masukan bukan angka' 
        ]); 
        
        //konfigurasi sebelum gambar diupload 
        $config['upload_path'] = './assets/img/upload/'; 
        $config['allowed_types'] = 'jpg|png|jpeg'; 
        $config['max_size'] = '30000'; 
        $config['max_width'] = '10240'; 
        $config['max_height'] = '10000'; 
        $config['file_name'] = 'img' . time(); 
        
        //memuat atau memanggil library upload 
        $this->load->library('upload', $config); 
        
        if ($this->form_validation->run() == false) { 
            $this->load->view('templates/header', $data); 
            $this->load->view('templates/sidebar', $data); 
            $this->load->view('templates/topbar', $data); 
            $this->load->view('peralatan/ubah_peralatan', $data); 
            $this->load->view('templates/footer'); 
        } else { 
            if ($this->upload->do_upload('image')) { 
                $image = $this->upload->data(); 
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE)); 
                    $gambar = $image['file_name']; 
                } else { 
                    $gambar = $this->input->post('old_pict', TRUE); 
                } 
                
                $data = [ 
                    'nama_alat' => $this->input->post('nama_alat', true),  
                    'id_kategori' => $this->input->post('id_kategori', true), 
                    'tahun_buat' => $this->input->post('tahun', true), 
                    'stok' => $this->input->post('stok', true), 
                    'image' => $gambar 
                ]; 
                
                $this->ModelPeralatan->updatePeralatan($data, ['id' => $this->input->post('id')]); 
                redirect('peralatan'); 
        } 
    }

    public function hapusPeralatan()
        { 
            $where = ['id' => $this->uri->segment(3)]; 
            $this->ModelPeralatan->hapusPeralatan($where); 
            redirect('peralatan'); 
        }
}