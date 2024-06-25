Catalog Controller (catalog/controller/extension/module/chromadb.php):


<?php
class ControllerExtensionModuleChromaDB extends Controller {
    public function index() {
        $this->load->language('extension/module/chromadb');

        if ($this->request->server['REQUEST_METHOD'] == 'POST' && isset($this->request->files['image'])) {
            $results = $this->queryImage($this->request->files['image']);
            $data['results'] = $results;
        }

        return $this->load->view('extension/module/chromadb', $data);
    }

    private function queryImage($image) {
        $url = 'http://localhost:8000/image-query';
        $cfile = new CURLFile($image['tmp_name'], $image['type'], $image['name']);

        $data = array('image' => $cfile);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true);
    }
}




View File (catalog/view/theme/default/template/extension/module/chromadb.twig)

<div>
    <h2>Image Search</h2>
    <form action="{{ action }}" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Search</button>
    </form>

    {% if results %}
    <h3>Search Results</h3>
    <pre>{{ results }}</pre>
    {% endif %}
</div>



Controller Changes (catalog/controller/extension/module/chromadb.php):


public function index() {
    $this->load->language('extension/module/chromadb');

    $data['action'] = $this->url->link('extension/module/chromadb', '', true);

    if ($this->request->server['REQUEST_METHOD'] == 'POST' && isset($this->request->files['image'])) {
        $results = $this->queryImage($this->request->files['image']);
        $data['results'] = $results['results'];
    }

    return $this->load->view('extension/module/chromadb', $data);
}

