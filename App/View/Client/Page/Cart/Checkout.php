<?php

namespace App\View\Client\Page\Cart;

use App\View\BaseView;

class Checkout extends BaseView
{
    public static function render($data = null)
    {
?>

        <section class="breadcrumb-section set-bg" data-setbg="/public/assets/client/img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Thanh toán</h2>
                            <div class="breadcrumb__option">
                                <a href="./index.html">Home</a>
                                <span>Thanh toán</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Checkout Section Begin -->
        <section class="checkout spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h6><span class="icon_tag_alt"></span>Có phiếu giảm giá? <a href="#">bấm vào đây</a> để nhập mã của bạn
                        </h6>
                    </div>
                </div>
                <div class="checkout__form">
                    <h4>Chi tiết thanh toán</h4>
                    <form action="/order" method="post">
                        <input type="hidden" name="method" value="POST">
                        <div class="row">
                            <div class="col-lg-7 col-md-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="checkout__input">
                                            <p>Họ và Tên<span>*</span></p>
                                            <input type="text" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="phone">
                                </div>
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" placeholder="" class="checkout__input__add" name="email">

                                </div>
                                <!-- <div class="checkout__input row">
                                    <div class="col-4">
                                        <select name="province" id="province">

                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="district" id="district">
                                            <option value="">Vui lòng chọn quận</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="ward" id="ward">
                                            <option value="">Vui lòng chọn phường</option>
                                        </select>
                                    </div>
                                </div> -->

                                <div class="checkout__input">
                                    <p>Địa chỉ<span>*</span></p>
                                    <textarea name="address" type="text" class="form-control" placeholder="Địa chỉ" cols="10" rows="5"></textarea>
                                </div>



                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="checkout__order">
                                    <h4>Đơn hàng của bạn</h4>
                                    <div class="checkout__order__products">Sản phảm <span>Tổng</span></div>
                                    <ul>
                                        <?php
                                        $total_price = 0;
                                        foreach ($data['cart_data'] as $cart):
                                            $unit_price = $cart['quantity'] * $cart['data']['price'];
                                            $total_price += $unit_price;
                                        ?>
                                            <li><?= $cart['data']['name'] ?><span><?= number_format($unit_price) ?> VNĐ</span></li>

                                        <?php
                                        endforeach;
                                        ?>

                                    </ul>
                                    <div class="checkout__order__subtotal">Phí vận chuyển <span>0 VNĐ</span></div>
                                    <div class="mb-3 row">

                                        <select name="payment_method">
                                            <option value="">Chọn phương thức thanh toán</option>
                                            <option value="0">COD (Chuyển khoản ngân hàng)</option>
                                            <option value="1">Chuyển khoản ngân hàng</option>

                                        </select>
                                    </div>

                                    <div class="checkout__order__total">Tổng <span><?= number_format($total_price) ?> VNĐ</span></div>

                                    <input type="hidden" name="total" value="<?= $total_price ?>">


                                    <button type="submit" class="site-btn">
                                        ĐẶT HÀNG</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            const host = "https://provinces.open-api.vn/api/";
            var callAPI = (api) => {
                return axios.get(api).then((response) => {
                    renderData(response.data, "province");
                });
            };
            callAPI("https://provinces.open-api.vn/api/?depth=1");
            var callApiDistrict = (api) => {
                return axios.get(api).then((response) => {
                    renderData(response.data.districts, "district");
                });
            };
            var callApiWard = (api) => {
                return axios.get(api).then((response) => {
                    renderData(response.data.wards, "ward");
                });
            };

            var renderData = (array, select) => {
                let row = '    <option disable value="">Vui lòng chọn tỉnh</option>';
                array.forEach((element) => {
                    row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`;
                });
                document.querySelector("#" + select).innerHTML = row;
            };

            $("#province").change(() => {
                let provinceId = $("#province option:selected").attr("data-id");
                callApiDistrict(host + "p/" + provinceId + "?depth=2");
                printResult();
            });

            $("#district").change(() => {
                let districtId = $("#district option:selected").attr("data-id");
                callApiWard(host + "d/" + districtId + "?depth=2");
                printResult();
            });

            $("#ward").change(() => {
                printResult();
            });

            var printResult = () => {
                if ($("#district").val() != "" && $("#province").val() != "" &&
                    $("#ward").val() != "") {

                    let provinceName = $("#province option:selected").text();
                    let districtName = $("#district option:selected").text();
                    let wardName = $("#ward option:selected").text();

                    let provinceId = $("#province option:selected").attr("data-id");
                    let districtId = $("#district option:selected").attr("data-id");
                    let wardId = $("#ward option:selected").attr("data-id");

                    let result = `${provinceName} (ID: ${provinceId}) | ${districtName} (ID: ${districtId}) | ${wardName} (ID: ${wardId})`;
                    $("#result").text(result);
                }
            }
        </script> -->
<?php

    }
}

?>