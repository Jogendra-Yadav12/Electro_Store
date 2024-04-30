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

<script>
$(document).ready(function() {
    $('#bg-remove-form').on('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        
        $.ajax({
            url: '{{ action_ajax }}',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                // Show loading spinner or message
            },
            success: function(response) {
                if (response.success) {
                    $('#modified-image').attr('src', response.modified_image);
                } else {
                    alert(response.error);
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                alert('AJAX request failed: ' + textStatus);
            },
            complete: function() {
                // Hide loading spinner or message
            }
        });
    });
});
</script>

<div class="bg-remove">
    {% if error_warning %}
        <div class="alert alert-danger">{{ error_warning }}</div>
    {% endif %}
    <form id="bg-remove-form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Remove Background</button>
    </form>
    <div id="modified-image-container">
        {% if modified_image %}
            <h2>Modified Image:</h2>
            <img id="modified-image" src="{{ modified_image }}" alt="Modified Image">
        {% endif %}
    </div>
</div>



//  controller

<?php
class ControllerExtensionModuleBgRemove extends Controller {
    public function index() {
        $this->load->language('extension/module/bg_remove');
        $this->document->setTitle($this->language->get('heading_title'));

        $data['heading_title'] = $this->language->get('heading_title');
        $data['action_ajax'] = $this->url->link('extension/module/bg_remove/removeBackgroundAjax', 'user_token=' . $this->session->data['user_token'], true);

        return $this->load->view('extension/module/bg_remove', $data);
    }

    public function removeBackgroundAjax() {
        $this->load->language('extension/module/bg_remove');

        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            $image_data = isset($this->request->post['image_data']) ? base64_decode($this->request->post['image_data']) : '';

            if (!empty($image_data)) {
                $api_key = BG_REMOVE_API_KEY;
                $url = 'https://api.remove.bg/v1.0/removebg';
                $headers = array(
                    'X-Api-Key: ' . $api_key
                );
                $data = array(
                    'image_file_b64' => base64_encode($image_data),
                    'size' => 'auto'
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

                if ($http_status == 200) {
                    $result = json_decode($response, true);
                    $json['success'] = true;
                    $json['modified_image'] = $result['data']['result_url'];
                } else {
                    $json['error'] = $this->language->get('error_failed');
                }
            } else {
                $json['error'] = $this->language->get('error_no_image');
            }

            $this->response->addHeader('Content-Type: application/json');
            $this->response->setOutput(json_encode($json));
        }
    }
}
