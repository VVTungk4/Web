// Lấy tham số id từ URL
const urlParams = new URLSearchParams(window.location.search);
const productId = urlParams.get('id');

// Lấy dữ liệu từ tệp JSON
fetch('products.json')
    .then(response => response.json())
    .then(products => {
        // Tìm sản phẩm với id tương ứng
        const product = products.find(p => p.id == productId);
        if (product) {
            // Hiển thị thông tin sản phẩm
            document.getElementById('product-image').src = product.image;
            document.getElementById('product-name').innerText = product.name;
            document.getElementById('product-price').innerText = `Giá: ${product.price}`;

            // Tải nội dung của file mô tả
            fetch(product.description)
                .then(response => response.text())
                .then(description => {
                    document.getElementById('product-description').innerText = description;
                });
        } else {
            document.getElementById('product-container').innerText = 'Product not found';
        }
    });







// Lấy phần tử số lượng và nút cộng/trừ từ DOM
const quantityInput = document.getElementById('quantity');
const incrementButton = document.getElementById('increment');
const decrementButton = document.getElementById('decrement');

// Thêm sự kiện click cho nút cộng
incrementButton.addEventListener('click', function() {
    // Tăng giá trị số lượng lên 1
    quantityInput.value = parseInt(quantityInput.value) + 1;
});

// Thêm sự kiện click cho nút trừ
decrementButton.addEventListener('click', function() {
    // Đảm bảo giá trị số lượng không nhỏ hơn 1 trước khi giảm
    if (parseInt(quantityInput.value) > 1) {
        // Giảm giá trị số lượng đi 1
        quantityInput.value = parseInt(quantityInput.value) - 1;
    }
});
