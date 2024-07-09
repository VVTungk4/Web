document.addEventListener('DOMContentLoaded', function () {
    const storedAddresses = document.getElementById('stored_addresses');
    const form = document.getElementById('checkout_complete');
    const fullNameInput = document.getElementById('billing_address_full_name');
    const phoneInput = document.getElementById('billing_address_phone');
    const addressInput = document.getElementById('billing_address_address');

    storedAddresses.addEventListener('change', function() {
        if (this.value === 'add') {
            form.reset();
        } else {
            getUserInfo();
        }
    });

    fullNameInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^a-zA-ZÀ-ỹ\s]/g, '');
    });

    phoneInput.addEventListener('input', function() {
        this.value = this.value.replace(/\D/g, '');
    });

    function getUserInfo() {
        fetch('../php/get_user_info.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                } else {
                    fullNameInput.value = data.fullname || '';
                    phoneInput.value = data.phone_number || '';
                    addressInput.value = data.address || '';
                }
            })
            .catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });
    }
});

// ... (phần còn lại của file giữ nguyên)

function checkInput() {
    const fullName = document.getElementById('billing_address_full_name');
    const phone = document.getElementById('billing_address_phone');
    const address = document.getElementById('billing_address_address');
    const fullNameError = document.getElementById('fullname_error');
    const phoneError = document.getElementById('phone_error');
    const addressError = document.getElementById('address_error');

    [fullNameError, phoneError, addressError].forEach(error => error.style.display = 'none');
    [fullName, phone, address].forEach(input => input.style.borderColor = '');

    let hasError = false;

    if (fullName.value.trim() === '') {
        showError(fullName, fullNameError, 'Vui lòng không bỏ trống Họ tên');
        hasError = true;
    } else if (!/^[a-zA-ZÀ-ỹ\s]+$/.test(fullName.value.trim())) {
        showError(fullName, fullNameError, 'Họ tên chỉ được chứa chữ cái và khoảng trắng');
        hasError = true;
    }

    if (phone.value.trim() === '') {
        showError(phone, phoneError, 'Vui lòng không bỏ trống Số điện thoại');
        hasError = true;
    } else if (!/^\d{10,11}$/.test(phone.value.trim())) {
        showError(phone, phoneError, 'Số điện thoại phải có 10 hoặc 11 chữ số');
        hasError = true;
    }

    if (address.value.trim() === '') {
        showError(address, addressError, 'Vui lòng không bỏ trống địa chỉ');
        hasError = true;
    }

    return !hasError;
}

function showError(input, errorElement, message) {
    errorElement.textContent = message;
    errorElement.style.display = 'block';
    errorElement.style.color = 'red';
    input.style.borderColor = 'red';
}