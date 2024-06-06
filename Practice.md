Structure

app/
  addons/
    quick_invoice_print/
      addon.xml
      func.php
      init.php
      controllers/
        backend/
          quick_invoice_print.php
      schemas/
        permissions/
          admin.post.php
        menu/
          menu.post.php
      designs/
        backend/
          templates/
            addons/
              quick_invoice_print/
                views/
                  quick_invoice_print/
                    print_invoice.tpl
                    

// Addon xml file

<?xml version="1.0"?>
<addon scheme="2.1" version="1.0">
    <id>quick_invoice_print</id>
    <name>Quick Invoice Print</name>
    <description>Add-on for quick printing invoices</description>
    <version>1.0</version>
    <compatibility>
        <core_version>4.0.1</core_version>
    </compatibility>
    <settings></settings>
</addon>


// init.php

<?php
if (!defined('BOOTSTRAP')) { die('Access denied'); }

fn_register_hooks(
    'dispatch_before_display'
);

// Create menu.post.php

<?php
$schema['central']['orders']['items']['quick_invoice_print'] = array(
    'href' => 'quick_invoice_print.manage',
    'position' => 900,
    'subitems' => array(
        'print_invoice' => array(
            'href' => 'quick_invoice_print.print_invoice',
            'position' => 100
        ),
    ),
);

return $schema;

// admin.post.php 

<?php
$schema['quick_invoice_print'] = array(
    'permissions' => 'manage_orders',
);

return $schema;

// Backend Controller

<?php
if (!defined('BOOTSTRAP')) { die('Access denied'); }

use Tygh\Registry;

class QuickInvoicePrintController
{
    public function __construct()
    {
        // Initialization code
    }

    public function handleRequest($mode)
    {
        if ($mode == 'print_invoice') {
            $this->printInvoice();
        }
    }

    private function printInvoice()
    {
        $order_id = $_REQUEST['order_id'];
        $order_info = fn_get_order_info($order_id);

        Tygh::$app['view']->assign('order_info', $order_info);
        Tygh::$app['view']->display('addons/quick_invoice_print/views/quick_invoice_print/print_invoice.tpl');

        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle any POST requests here
}

$mode = Registry::get('runtime.mode');
$controller = new QuickInvoicePrintController();
$controller->handleRequest($mode);



// Print_invoice.tpl

{include file="common/subheader.tpl" title="Print Invoice"}

<div id="invoice">
    <h1>Invoice</h1>
    <p>Order ID: {$order_info.order_id}</p>
    <p>Customer: {$order_info.firstname} {$order_info.lastname}</p>
    <p>Total: {$order_info.total}</p>
    <!-- Add more order details as needed -->
</div>

<script type="text/javascript">
    window.onload = function() {
        window.print();
    };
</script>


//  design/backend/templates/addons/quick_invoice_print/hooks/orders/

{** 
 * Hook to add a print invoice button to the order details page
 *}
<li>
    <a class="btn" href="{url controller="quick_invoice_print" mode="print_invoice" order_id=$order_info.order_id}" target="_blank">
        Print Invoice
    </a>
</li>





























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
