// Controller

<?php
class ControllerExtensionModuleBgRemove extends Controller {
    public function index() {
        $this->load->language('extension/module/bgremove');
    
        $this->document->setTitle($this->language->get('heading_title'));
    
        $this->load->model('tool/image');
    
        $error = array();
    
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $image_data = '';
    
            if (!empty($this->request->files['image']['tmp_name']) && is_uploaded_file($this->request->files['image']['tmp_name'])) {

                $image_data = file_get_contents($this->request->files['image']['tmp_name']);

                $image_data = base64_encode($image_data);
            }
    
            if (!empty($image_data)) {
                $result = $this->removeBackground($image_data);
                if ($result['success']) {
                    $this->session->data['success'] = $result['message'];
                    $data['modified_image'] = $result['modified_image'];
                } else {
                    $error['warning'] = $result['error'];
                }
            } else {
                $error['warning'] = 'Please upload an image.';
            }
        }
    
        $data['heading_title'] = $this->language->get('heading_title');
        $data['error_warning'] = isset($error['warning']) ? $error['warning'] : '';
    
        return $this->load->view('extension/module/bgremove', $data);
    }
    

    private function validate() {
        
        return true;
    }

    private function removeBackground($image_data) {
        $api_key = 'coJFngPJ381j25P7K4XK87G5';
        $url = 'https://api.remove.bg/v1.0/removebg';
        $headers = array(
            'X-Api-Key: ' . $api_key
        );
        $data = array(
            'image_file_b64' => $image_data,
            'size' => 'regular'
        );
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
        curl_close($ch);
    
        // Process API response
        if ($http_status == 200) {
            // Successful response
            return array(
                'success' => true,
                'message' => 'Background removed successfully.',
                'modified_image' => 'data:image/png;base64,' . base64_encode($response)
            );
        } else {
            // Error response
            return array(
                'success' => false,
                'error' => 'Failed to remove background. HTTP Status Code: ' . $http_status
            );
        }
    }
    
}


// Twig File

<div class="bg-remove">
    {% if error_warning %}
        <div class="alert alert-danger">{{ error_warning }}</div>
    {% endif %}
    <form action="{{ action }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Remove Background</button>
    </form>
    {% if modified_image %}
        <h2>Modified Image:</h2>
        <img src="{{ modified_image }}" alt="Modified Image">
    {% endif %}
</div>

// language 

<?php
// Heading
$_['heading_title'] = 'Background Removal';



// AJAX  

<!-- catalog/view/theme/default/template/extension/module/bgremove.twig -->
<div id="bgremove">
    <h2>{{ heading_title }}</h2>
    
    {% if error_warning %}
    <div class="alert alert-danger">{{ error_warning }}</div>
    {% endif %}
    
    <form id="upload-form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Select Image:</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Remove Background</button>
    </form>
    
    <div id="result"></div>
</div>

<script>
    $(document).ready(function() {
        $('#upload-form').submit(function(e) {
            e.preventDefault();

            var formData = new FormData($(this)[0]);

            $.ajax({
                url: 'index.php?route=extension/module/bgremove',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.success) {
                        $('#result').html('<img src="' + response.modified_image + '">');
                    } else {
                        alert('Error: ' + response.error);
                    }
                },
                error: function() {
                    alert('An error occurred while processing your request.');
                }
            });
        });
    });
</script>




//  controller

<?php
// Controller file: catalog/controller/extension/module/bgremove.php
class ControllerExtensionModuleBgRemove extends Controller {
    public function index() {
        $this->load->language('extension/module/bgremove');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('tool/image');

        $error = array();

        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            if (!empty($this->request->files['image']['tmp_name']) && is_uploaded_file($this->request->files['image']['tmp_name'])) {
                $image_data = file_get_contents($this->request->files['image']['tmp_name']);
                $image_data = base64_encode($image_data);

                $result = $this->removeBackground($image_data);

                if ($result['success']) {
                    $this->response->setOutput(json_encode(array('success' => true, 'modified_image' => $result['modified_image'])));
                    return;
                } else {
                    $this->response->setOutput(json_encode(array('success' => false, 'error' => $result['error'])));
                    return;
                }
            } else {
                $this->response->setOutput(json_encode(array('success' => false, 'error' => 'Please upload an image.')));
                return;
            }
        }

        $data['heading_title'] = $this->language->get('heading_title');
        $data['error_warning'] = isset($error['warning']) ? $error['warning'] : '';

        $this->response->setOutput($this->load->view('extension/module/bgremove', $data));
    }

    private function removeBackground($image_data) {
        $api_key = 'VVWB468LUnChzQC3vVTJipDg';
        $url = 'https://api.remove.bg/v1.0/removebg';
        $headers = array(
            'X-Api-Key: ' . $api_key
        );
        $data = array(
            'image_file_b64' => $image_data,
            'size' => 'regular'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        // Process API response
        if ($http_status == 200) {
            // Successful response
            return array(
                'success' => true,
                'modified_image' => 'data:image/png;base64,' . base64_encode($response)
            );
        } else {
            // Error response
            return array(
                'success' => false,
                'error' => 'Failed to remove background. HTTP Status Code: ' . $http_status
            );
        }
    }
}
