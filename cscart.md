'custom_print' => [
'name'     => ['template' => 'custom_print'],
'dispatch' => '',
'data'     => [
    'action_class' => '',
    'onclick' => 'printSelectedOrders();', // Custom JavaScript function call
],
'position' => 50,
],

Step 2: Create an Endpoint to Fetch Order Data
Modify your your_addon.php file to handle fetching the order data and returning it as a JSON response.

<?php
if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($mode == 'get_order_details') {
        $order_id = $_REQUEST['order_id'];

        if (!empty($order_id)) {
            // Fetch order details
            $order_info = fn_get_order_info($order_id);

            if ($order_info) {
                // Return order details as JSON
                echo json_encode([
                    'status' => 'success',
                    'data' => $order_info
                ]);
            } else {
                // Return error if order not found
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Order not found'
                ]);
            }
        } else {
            // Return error if order ID is missing
            echo json_encode([
                'status' => 'error',
                'message' => 'Order ID is missing'
            ]);
        }

        exit;
    }
}
?>


Step 3: Set Up Your Frontend
Create a JavaScript file to handle the AJAX request, process the order data, and encode it using EscPosEncoder.

1. Include the EscPosEncoder library
Ensure you have EscPosEncoder available in your project. You can include it via a <script> tag or an import statement if you are using a module bundler.

2. Create a JavaScript file
Create a JavaScript file (e.g., order_printer.js) and add the following code:

import EscPosEncoder from 'path/to/esc-pos-encoder.esm.js';

// Function to fetch order details
function fetchOrderDetails(orderIds) {
    return fetch('index.php?dispatch=your_addon.print_invoices', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `order_ids[]=${orderIds.join('&order_ids[]=')}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            return data.data;
        } else {
            throw new Error(data.message);
        }
    });
}

// Function to print orders
function printOrders(orderIds) {
    fetchOrderDetails(orderIds)
    .then(ordersInfo => {
        ordersInfo.forEach(orderInfo => {
            let encoder = new EscPosEncoder();

            let result = encoder
                .initialize()
                .text(`Order #${orderInfo.order_id}`)
                .newline()
                .text(`Date: ${new Date(orderInfo.timestamp * 1000).toLocaleString()}`)
                .newline()
                .text('Items:')
                .newline();

            orderInfo.products.forEach(product => {
                result.text(`${product.product}`)
                    .newline()
                    .text(`Qty: ${product.amount}  Price: $${product.price}`)
                    .newline();
            });

            result.text(`Total: $${orderInfo.total}`)
                .newline()
                .qrcode(`https://yourstore.com/order/${orderInfo.order_id}`)
                .encode();

            // Send `result` to your printer
            console.log(result);
            // You need to send the encoded data to your ESC/POS printer using appropriate method
        });
    })
    .catch(error => {
        console.error('Error fetching order details:', error);
    });
}

// Function to handle the click event and get selected order IDs
function printSelectedOrders() {
    // Collect selected order IDs from checkboxes
    let selectedOrderIds = [];
    document.querySelectorAll('input[name="order_ids[]"]:checked').forEach((checkbox) => {
        selectedOrderIds.push(checkbox.value);
    });

    if (selectedOrderIds.length > 0) {
        printOrders(selectedOrderIds);
    } else {
        alert('No orders selected');
    }
}

// Expose the function to the global scope
window.printSelectedOrders = printSelectedOrders;



Step 4: Include the JavaScript in Your CS-Cart Template
Include the order_printer.js script in the appropriate CS-Cart template file where you want to use it.

<script src="path/to/order_printer.js"></script>

