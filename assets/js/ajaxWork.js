// ----------------------------------------------------------------------------------
//  For Castomer
// ----------------------------------------------------------------------------------


function showCustomerOrder_Items() {
    $.ajax({
        url: "./customerView/viewOrder_items.php",
        method: "post",
        data: {record: 1},
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function showProductCastomerItems() {
    $.ajax({
        url: "./customerView/viewProducts.php", 
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}


function showCategoriesCastomerItems() {  
    $.ajax({
        url: "./customerView/viewCategories.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

function showManufacturerCastomerItems() {  
    $.ajax({
        url: "./customerView/viewManufacturers.php", 
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}


function showAccountItems(){  
    $.ajax({
        url:"./customerView/viewAccount.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}




function customerAccountEditForm(id) {
    $.ajax({
        url: "./customerView/editAccountForm.php",
        method: "post",
        data: {record: id},
        success: function(data){
            $('.allContent-section').html(data);
        }
    });
}


function customerAccountDelete(id){
    $.ajax({
        url:"./controller/deleteCustomerController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Clients Successfully deleted');
            $('form').trigger('reset');
            showAccountItems();
        }
    });
}

function updateCustomerAccount() {
    var id = $('#id').val();
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var patronymic = $('#patronymic').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var password = $('#password').val();

    var fd = new FormData();
    fd.append('id', id);
    fd.append('fname', fname);
    fd.append('lname', lname);
    fd.append('patronymic', patronymic);
    fd.append('email', email);
    fd.append('phone', phone);
    fd.append('password', password);  

    $.ajax({
        url: './controller/updateAccountController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Data Update Success.');
            showAccountItems();
        }
    });
}


function showCustomerOrdersItems(){  
    $.ajax({
        url:"./customerView/viewOrders.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}



// ----------------------------------------------------------------------------------
//  For Admin
// ----------------------------------------------------------------------------------


// ----------------------------------------------------------------------------------
//  For Сustomers 
// ----------------------------------------------------------------------------------

// Функція для відображення всіх клієнтів
function showCustomerItems() {  
    $.ajax({
        url: "./adminView/viewAllCustomers.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

// Функція для відображення форми редагування клієнта
function editCustomersForm(id) {
    $.ajax({
        url: "./adminView/editCustomersForm.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

// Функція для оновлення даних клієнта
function updateCustomer() {
    var customer_id = $('#customer_id').val();
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var patronymic = $('#patronymic').val();
    var email = $('#email').val();
    var phone = $('#phone').val();

    var fd = new FormData();
    fd.append('customer_id', customer_id);
    fd.append('fname', fname);
    fd.append('lname', lname);
    fd.append('patronymic', patronymic);
    fd.append('email', email);
    fd.append('phone', phone);

    $.ajax({
        url: "./controller/updateCustomerController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Customer Data Update Success.');
            $('form').trigger('reset');
            showCustomerItems();
        }
    });
}

// Функція для видалення клієнта
function customerDelete(id) {
    $.ajax({
        url: "./controller/deleteCustomerController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Customer Successfully deleted');
            $('form').trigger('reset');
            showCustomerItems();
        }
    });
}

// Функція для додавання нового клієнта
function addCustomer() {
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var patronymic = $('#patronymic').val();
    var email = $('#email').val();
    var phone = $('#phone').val();

    var fd = new FormData();
    fd.append('fname', fname);
    fd.append('lname', lname);
    fd.append('patronymic', patronymic);
    fd.append('email', email);
    fd.append('phone', phone);
    fd.append('upload', 'upload');  

    $.ajax({
        url: "./controller/addCustomerController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Customer Added successfully.');
            $('form').trigger('reset');
            showCustomerItems();
        }
    });
}

// ----------------------------------------------------------------------------------
//  For Manufacturers
// ----------------------------------------------------------------------------------

function showManufacturerItems() {  
    $.ajax({
        url: "./adminView/viewManufacturers.php", 
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

function editManufacturerForm(id) {
    $.ajax({
        url: "./adminView/editManufacturerForm.php", 
        method: "post",
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

// JavaScript
function updateManufacturers() {
    var manufacturer_id = $('#manufacturer_id').val();
    var name = $('#manufacturer_name').val();
    var country = $('#manufacturer_country').val();

    var fd = new FormData();
    fd.append('manufacturer_id', manufacturer_id);
    fd.append('name', name);
    fd.append('country', country);

    $.ajax({
        url: './controller/updateManufacturerController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Data Update Success.');
            $('form').trigger('reset');
            showManufacturerItems();
        }
    });
}

function manufacturerDelete(id) {
    $.ajax({
        url: "./controller/deleteManufacturerController.php", 
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Manufacturer Successfully deleted');
            $('form').trigger('reset');
            showManufacturerItems();
        }
    });
}

function addManufacturer() {
    var manufacturer_name = $('#manufacturer_name').val();
    var manufacturer_country = $('#manufacturer_country').val();

    var fd = new FormData();
    fd.append('manufacturer_name', manufacturer_name);
    fd.append('manufacturer_country', manufacturer_country);
    fd.append('upload', 'upload');

    $.ajax({
        url: "./controller/addManufacturerController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Manufacturer Added successfully.');
            $('form').trigger('reset');
            showManufacturerItems();
        }
    });
}


// ----------------------------------------------------------------------------------
//  For Orders 
// ----------------------------------------------------------------------------------

// Функція для відображення всіх замовлень
function showOrderItems() {
    $.ajax({
        url: "./adminView/viewOrders.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

// Функція для відображення форми редагування замовлення
function orderEditForm(id) {
    $.ajax({
        url: "./adminView/editOrderForm.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

// Функція для оновлення інформації про замовлення
function updateOrders() {
    var order_id = $('#order_id').val();
    var customer_id = $('#order_customer_id').val(); 
    var date = $('#order_date').val();
    var status = $('#order_status').val();
    var price = $('#order_price').val();
    var shipping_method = $('#order_shipping_method').val();
    var dispatch_city = $('#order_dispatch_city').val();
    var shipping_address = $('#order_shipping_address').val();
    var post = $('#order_post').val();
    var postal_office = $('#order_postal_office').val();
    var payment_method = $('#order_payment_method').val();
    var notes = $('#order_notes').val();

    var fd = new FormData();
    fd.append('order_id', order_id);
    fd.append('customer_id', customer_id);
    fd.append('date', date);
    fd.append('status', status);
    fd.append('price', price);
    fd.append('shipping_method', shipping_method);
    fd.append('dispatch_city', dispatch_city);
    fd.append('shipping_address', shipping_address);
    fd.append('post', post);
    fd.append('postal_office', postal_office);
    fd.append('payment_method', payment_method);
    fd.append('notes', notes);

    $.ajax({
        url: './controller/updateOrderController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Data Update Success.');
            $('form').trigger('reset');
            showOrderItems();
        }
    });
}


// Функція для видалення даних про замовлення
function orderDelete(id) {
    $.ajax({
        url: "./controller/deleteOrderController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Order Successfully deleted');
            $('form').trigger('reset');
            showOrderItems();
        }
    });
}


// Функція для додавання нового замовлення
function addOrder() {
    var order_date = $('#order_date').val();
    var order_status = $('#order_status').val();
    var order_price = $('#order_price').val();
    var order_shipping_method = $('#order_shipping_method').val();
    var order_dispatch_city = $('#order_dispatch_city').val();
    var order_shipping_address = $('#order_shipping_address').val();
    var order_post = $('#order_post').val();
    var order_postal_office = $('#order_postal_office').val();
    var order_payment_method = $('#order_payment_method').val();
    var order_notes = $('#order_notes').val();
    var order_customer = $('#order_customer').val(); 

    $.ajax({
        url: "./controller/addOrderController.php",
        method: "post",
        data: {
            order_date: order_date,
            order_status: order_status,
            order_price: order_price,
            order_shipping_method: order_shipping_method,
            order_dispatch_city: order_dispatch_city,
            order_shipping_address: order_shipping_address,
            order_post: order_post,
            order_postal_office: order_postal_office,
            order_payment_method: order_payment_method,
            order_notes: order_notes,
            order_customer: order_customer 
        },
        success: function (data) {
            alert('Order Added successfully.');
            $('#update-Orders').trigger('reset');
            
            showOrderItems();
            $('#addOrderModal').modal('hide');
        }
    });
}



// ----------------------------------------------------------------------------------
//  For Categories
// ----------------------------------------------------------------------------------

// Показати всі категорії
function showCategoriesItems() {  
    $.ajax({
        url: "./adminView/viewCategories.php",
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

// Редагувати форму категорії
function categoryEditForm(id){
    $.ajax({
        url: "./adminView/editCategoryForm.php",
        method: "post",
        data: { record: id },
        success: function(data){
            $('.allContent-section').html(data);
        }
    });
}

// Оновлення категорії
function updateCategory() {
    var category_id = $('#category_id').val();
    var category_name = $('#category_name').val();

    $.ajax({
        url: './controller/updateCategoryController.php',
        method: 'post',
        data: { category_id: category_id, category_name: category_name },
        success: function (data) {
            alert('Data Update Success.');
            $('form').trigger('reset');
            showCategoriesItems();
        }
    });
}

// Видалення категорії
function categoryDelete(id){
    $.ajax({
        url: "./controller/deleteCategoryController.php",
        method: "post",
        data: { record: id },
        success: function(data){
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showCategoriesItems();
        }
    });
}

// Додавання нової категорії
function addCategory(){
    var category_name = $('#category_name').val();

    $.ajax({
        url: "./controller/addCategoryController.php",
        method: "post",
        data: { category_name: category_name },
        success: function(data){
            alert('Category Added successfully.');
            $('#myModal').modal('hide');  
            showCategoriesItems();
        }
    });
}


// ----------------------------------------------------------------------------------
//  For Order_items
// ----------------------------------------------------------------------------------

// Функція для відображення елементів замовлення
function showOrder_Items() {
    $.ajax({
        url: "./adminView/viewOrder_items.php",
        method: "post",
        data: {record: 1},
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

// Функція для відображення форми редагування елемента замовлення
function order_ItemEditForm(id) {
    $.ajax({
        url: "./adminView/editOrderItemForm.php",
        method: "post",
        data: {record: id},
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

// Функція для оновлення інформації про елемент замовлення
function updateOrder_Item() {
    var order_item_id = $('#order_item_id').val();
    var order_id = $('#order_id').val();
    var product_id = $('#product_name').val();
    var count = $('#count').val();
    var subtotal = $('#subtotal').val();

    var fd = new FormData();
    fd.append('order_item_id', order_item_id);
    fd.append('order_id', order_id);
    fd.append('product_id', product_id);
    fd.append('count', count);
    fd.append('subtotal', subtotal);

    $.ajax({
        url: './controller/updateOrderItemController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Data Update Success.');
            $('form').trigger('reset');
            showOrder_Items();
        }
    });
}

// Функція для видалення елемента замовлення
function order_ItemDelete(id) {
    $.ajax({
        url: "./controller/deleteOrderItemController.php",
        method: "post",
        data: {record: id},
        success: function(data) {
            alert('Order Item Successfully deleted');
            $('form').trigger('reset');
            showOrder_Items();
        }
    });
}

function addOrder_Item() {
    var order_id = $('#order_id').val();
    var product_id = $('#product_name').val();
    var count = $('#count').val();
    var subtotal = $('#subtotal').val();

    $.ajax({
        url: './controller/addOrderItemController.php',
        method: 'post',
        data: {
            'order_id': order_id,
            'product_id': product_id,
            'count': count,
            'subtotal': subtotal,
            'upload': 'upload'
        },
        success: function(data) {
            alert('Order Item Added successfully.');
            $('#addOrderItemModal').modal('hide'); 
            showOrder_Items();
        },
        error: function(err) {
            console.error('Error adding order item:', err);
        }
    });
}


// ----------------------------------------------------------------------------------
//  For products 
// ----------------------------------------------------------------------------------

function showProductItems() {
    $.ajax({
        url: "./adminView/viewProducts.php", 
        method: "post",
        data: { record: 1 },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

function productEditForm(id) {
    $.ajax({
        url: "./adminView/editProductForm.php", 
        method: "post",
        data: { record: id },
        success: function (data) {
            $('.allContent-section').html(data);
        }
    });
}

function updateProduct() {
    var product_id = $('#product_id').val();
    var name = $('#product_name').val();
    var description = $('#product_description').val();
    var price = $('#product_price').val();
    var stock_quantity = $('#product_stock_quantity').val();
    var manufacturer_id = $('#manufacturer_id').val();
    var category_id = $('#category_id').val();

    var fd = new FormData();
    fd.append('product_id', product_id);
    fd.append('name', name);
    fd.append('description', description);
    fd.append('price', price);
    fd.append('stock_quantity', stock_quantity);
    fd.append('manufacturer_id', manufacturer_id);
    fd.append('category_id', category_id);

    $.ajax({
        url: './controller/updateProductController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Data Update Success.');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

// Видалення даних продукту
function productDelete(id) {
    $.ajax({
        url: "./controller/deleteProductController.php",
        method: "post",
        data: { record: id },
        success: function (data) {
            alert('Product Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

// Додавання даних продукту
function addProduct() {
    var product_name = $('#product_name').val();
    var product_description = $('#product_description').val();
    var product_price = $('#product_price').val();
    var product_stock_quantity = $('#product_stock_quantity').val();
    var manufacturer_id = $('#manufacturer_id').val();
    var category_id = $('#category_id').val();

    var fd = new FormData();
    fd.append('name', product_name);
    fd.append('description', product_description);
    fd.append('price', product_price);
    fd.append('stock_quantity', product_stock_quantity);
    fd.append('manufacturer_id', manufacturer_id);
    fd.append('category_id', category_id);
    fd.append('upload', 'upload');

    $.ajax({
        url: "./controller/addProductController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Product Added successfully.');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}


// ----------------------------------------------------------------------------------
//  For products 
// ----------------------------------------------------------------------------------


function showAdminItems(){  
    $.ajax({
        url:"./adminView/viewAdmin.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}




function adminAccountEditForm(id) {
    $.ajax({
        url: "./adminView/editAdminsForm.php",
        method: "post",
        data: {record: id},
        success: function(data){
            $('.allContent-section').html(data);
        }
    });
}


function adminAccountDelete(id){
    $.ajax({
        url:"./controller/deleteAdminController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Admin Successfully deleted');
            $('form').trigger('reset');
            showAdminItems();
        }
    });
}

function updateAdminAccount() {
    var id = $('#id').val();
    var name = $('#name').val();
    var surname = $('#surname').val();
    var patronymic = $('#patronymic').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var password = $('#password').val();

    var fd = new FormData();
    fd.append('id', id);
    fd.append('name', name);
    fd.append('surname', surname);
    fd.append('patronymic', patronymic);
    fd.append('email', email);
    fd.append('phone', phone);
    fd.append('password', password);  

    $.ajax({
        url: './controller/updateAdminController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Data Update Success.');
            showAdminItems();
        }
    });
}