

function updateQuantity(element, change) {
  let input = element
    .closest(".quantity-control")
    .querySelector('input[name="quantity"]');
  let newQuantity = parseInt(input.value) + change;
  if (newQuantity < 1) newQuantity = 1;
  input.value = newQuantity;
  sendUpdateRequest(input);
}

function manualUpdateQuantity(input) {
  let newQuantity = parseInt(input.value);
  if (isNaN(newQuantity) || newQuantity < 1) {
    input.value = 1;
    newQuantity = 1;
  }
  sendUpdateRequest(input);
}

function sendUpdateRequest(input) {
  let productId = input.getAttribute("data-id");
  let newQuantity = input.value;

  $.ajax({
    url: "/cart/update",
    method: "POST",
    data: {
      method: "POST",
      id: productId,
      quantity: newQuantity,
    },
    success: function (response) {
      console.log("Cập nhật giỏ hàng thành công:", response);
      updateTotalPrice();
    },
    error: function (error) {
      console.error("Lỗi khi cập nhật giỏ hàng:", error);
      alert("Đã có lỗi xảy ra, vui lòng thử lại.");
    },
  });
}

function updateTotalPrice() {
  let quantityInputs = document.querySelectorAll("input[name='quantity']");
  let totalPrice = 0;

  quantityInputs.forEach((input) => {
    let price = parseInt(input.getAttribute("data-price"), 10);
    let quantity = parseInt(input.value, 10);
    let subtotal = price * quantity;
    input.closest("tr").querySelector(".subtotal").innerText =
      subtotal.toLocaleString() + " VNĐ";
    totalPrice += subtotal;
  });

  document.querySelector(".shoping__checkout span").innerText =
    totalPrice.toLocaleString() + " VNĐ";
}

updateTotalPrice();
