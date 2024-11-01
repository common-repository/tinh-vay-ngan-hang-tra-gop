<?php
/**
 * Plugin Name: Tính Lãi Vay Ngân Hàng Trả Góp
 * Plugin URI: https://moneynextdoor.com 
 * Description: Tính lãi trả góp theo dư nợ ban đầu hoặc giảm dần
 * Version: 1.4 
 * Author: Tran Trong Tri
 * Author URI: https://trantrongtri.com  
 * License: GPLv2 or later 
 */

// add css and js
function tlvtg_enqueue_scripts_and_styles()
{
        wp_register_style( 'mnd-tlvtg-css', plugins_url('/css/mnd_laivay_cp.css', __FILE__ ));
        wp_enqueue_style( 'mnd-tlvtg-css' );
        wp_enqueue_script('jquery');
        wp_register_script('mnd-tlvtg-script', plugins_url( '/js/skin_bootstrap.js', __FILE__ ));
        wp_enqueue_script( 'mnd-tlvtg-script' );
 
}
add_action( 'wp_enqueue_scripts', 'tlvtg_enqueue_scripts_and_styles' );


// add shortcode for loan table page
function tlvtg_func() {
    return '<style type="text/css" id="wp-custom-css">
                    form.wpcf7-form select {
            width: 100%;
            max-width: 310px;
        }		</style>		            
                                <div class="devvn_laivay_muanha">
                        <div class="content-value-interest-retes">
                            <div class="index-value-interest-retes">
                                <div class="item">
                                    <p class="title">Số tiền vay</p>
                                    <div class="text-input">
                                        <input type="text" class="txt-input txt-amount-borrow currency interest-txt-changle" value="2,000,000,000">
                                        <span class="quantitative">VNĐ</span>
                                    </div>
                                </div>
                                <div class="item">
                                    <p class="title">Thời gian tiền vay</p>
                                    <div class="text-input">
                                        <input type="text" class="txt-input txt-time interest-txt-changle" value="5">
                                        <span class="quantitative">Năm</span>
                                    </div>
                                </div>
                                <div class="item">
                                    <p class="title">Lãi suất vay </p>
                                    <div class="text-input">
                                        <input type="number" class="txt-input txt-intesrest interest-txt-changle" value="11">
                                        <span class="quantitative">%/năm</span>
                                    </div>
                                </div>
                                <div class="item">
                                    <p class="title">Loại hình vay</p>
                                    <div class="text-input txt-type-interest">
                                        <select name="interest-type" class="interest" onchange="interest_changed(this)">
                                            <option value="2">Trả lãi theo dư nợ giảm dần</option>
                                            <option value="1">Trả lãi chia đều</option>
                                        </select>
                                        <span class="drop"></span>
                                    </div>
                                </div>
                                <div class="item item-calculator">
                                    <button class="btn-calculator">Tính toán</button>
                                </div>
                            </div>
                            <div class="payment">
                                <div class="total-payment">
                                    <div class="item-payment share-all">
                                        <p class="txt-payment">Số tiền hàng tháng phải trả</p>
                                        <p class="txt-index-payment txt-total-amount-month">20.000.000 đ</p>
                                    </div>
                                    <div class="item-payment item-payment-02">
                                        <p class="txt-payment">Tổng số tiền lãi phải trả</p>
                                        <p class="txt-index-payment txt-total-amount-interest">500.000.000 đ</p>
                                    </div>
                                    <div class="item-payment">
                                        <p class="txt-payment">Tổng số tiền phải trả</p>
                                        <p class="txt-index-payment txt-total-amount">5.000.000.000 đ</p>
                                    </div>
                                    <div class="detail-payment">
                                        <button class="btn-detail-payment">CHI TIẾT LỊCH TRẢ NỢ</button>
                                                              
                                        </div>
                        
                        <div class="screen-reader-response"></div>
        </div>                            
        </div>
        </div>
                        <div class="clearfix"></div>
                        <div class="tbl-detail-payment" id="loantbl">
                            <table>
                                <thead>
                                <tr>
                                    <th>Số kỳ trả</th>
                                    <th>Dư nợ đầu kỳ (VND)</th>
                                    <th>Gốc phải trả (VND)</th>
                                    <th>Lãi phải trả (VND)</th>
                                    <th>Gốc + Lãi(VND)</th>
                                </tr>
                                </thead>
                                <tbody id="body_result"></tbody>
                                <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Tổng</td>
                                    <td id="rs_interest_total">0</td>
                                    <td id="rs_total">0</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
        ';
            }
add_shortcode( 'tlvtg' ,'tlvtg_func');
?>