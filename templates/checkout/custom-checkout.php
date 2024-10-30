<?php echo "<script type='text/javascript' src='".CWMP_MP_PLUGIN_URL."assets/js/card.js'></script>"; ?>
<div class="card-container jp-card-container" style="width:100% !important;"></div>
<div class="mp-panel-custom-checkout">
	<?php
		// @codingStandardsIgnoreLine
		echo esc_html($checkout_alert_test_mode);
	?>
	<div class="mp-row-checkout">
		<div class="mp-col-md-12">
			<div class="frame-tarjetas">
				<div id="mercadopago-form">
					<!-- Input Card number -->
					<div class="mp-row-checkout mp-pt-10">
						<div class="mp-col-md-12">
							<input type="text" placeholder="Número do Cartão" onkeyup="mpCreditMaskDate(this, mpMcc);" class="mp-form-control mp-mt-5 jp-card-number" id="mp-card-number" name="number" data-checkout="cardNumber" autocomplete="off" maxlength="23" />
							<span class="mp-error mp-mt-5" id="mp-error-205" data-main="#mp-card-number"><?php echo esc_html__( 'Card number' ); ?></span>
							<span class="mp-error mp-mt-5" id="mp-error-E301" data-main="#mp-card-number"><?php echo esc_html__( 'Invalid Card Number' ); ?></span>
						</div>
					</div>
					<!-- Input Name and Surname -->
					<div class="mp-row-checkout mp-pt-10" id="mp-card-holder-div">
						<div class="mp-col-md-12">
							<input type="text" name="name" placeholder="Nome" class="mp-form-control mp-mt-5 jp-card-name" id="mp-card-holder-name" data-checkout="cardholderName" autocomplete="off" />
							<span class="mp-error mp-mt-5" id="mp-error-221" data-main="#mp-card-holder-name"><?php echo esc_html__( 'Invalid Card Number' ); ?></span>
							<span class="mp-error mp-mt-5" id="mp-error-E301" data-main="#mp-card-holder-name"><?php echo esc_html__( 'Invalid Card Number' ); ?></span>
						</div>
					</div>

					<div class="mp-row-checkout mp-pt-10">
						<!-- Input expiration date -->
						<div class="mp-col-md-6 mp-pr-15">
							<input type="text" name="expiry" onkeyup="mpCreditMaskDate(this, mpDate);" onblur="mpValidateMonthYear()" class="mp-form-control mp-mt-5 jp-card-expiry" id="mp-card-expiration-date" data-checkout="cardExpirationDate" autocomplete="off" placeholder="MM/AAAA" maxlength="7" />
							<input type="hidden" id="cardExpirationMonth" data-checkout="cardExpirationMonth">
							<input type="hidden" id="cardExpirationYear" data-checkout="cardExpirationYear">
							<span class="mp-error mp-mt-5" id="mp-error-208" data-main="#mp-card-expiration-date"><?php echo esc_html__( 'Invalid Expiration Date' ); ?></span>
						</div>
						<!-- Input Security Code -->
						<div class="mp-col-md-6">
							<input type="text" name="cvc" placeholder="CVC" onkeyup="mpCreditMaskDate(this, mpInteger);" class="mp-form-control mp-mt-5 jp-card-cvc" id="mp-security-code" data-checkout="securityCode" autocomplete="off" maxlength="4" />
							<span class="mp-error mp-mt-5" id="mp-error-224" data-main="#mp-security-code"><?php echo esc_html__( 'Check the informed security code.' ); ?></span>
							<span class="mp-error mp-mt-5" id="mp-error-E302" data-main="#mp-security-code"><?php echo esc_html__( 'Check the informed security code.' ); ?></span>
						</div>
					</div>

					<div class="mp-col-md-12">
						<div class="frame-tarjetas">
							<!-- Select issuer -->
							<div class="mp-row-checkout mp-pt-10">
								<div id="mp-issuer-div" class="mp-col-md-4 mp-pr-15">
									<div class="mp-issuer">
										<label for="mp-issuer" class="mp-label-form"><?php echo esc_html__( 'Issuer' ); ?> </label>
										<select class="mp-form-control mp-pointer mp-mt-5" id="mp-issuer" data-checkout="issuer" name="mercadopago_custom[issuer]"></select>
									</div>
								</div>

								<!-- Select installments -->
								<div id="installments-div" class="mp-col-md-12">
									<select class="mp-form-control mp-pointer mp-mt-5" id="mp-installments" data-checkout="installments" name="mercadopago_custom[installments]"></select>
									<div id="mp-box-input-tax-cft">
										<div id="mp-box-input-tax-tea">
											<div id="mp-tax-tea-text"></div>
										</div>
										<div id="mp-tax-cft-text"></div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div id="mp-doc-div" class="mp-col-md-12 mp-doc">
						<div class="frame-tarjetas">

							<div id="mp-doc-type-div" class="mp-row-checkout mp-pt-10">
								<!-- Select Doc Type -->
								<div class="mp-col-md-4 mp-pr-15">
									<select id="docType" class="mp-form-control mp-pointer mp-mt-04rem" data-checkout="docType"></select>
								</div>

								<!-- Input Doc Number -->
								<div id="mp-doc-number-div" class="mp-col-md-8">
									<input type="text" placeholder="CPF/CNPJ" class="mp-form-control mp-mt-04rem" id="docNumber" data-checkout="docNumber" autocomplete="off" />
									<span class="mp-error mp-mt-5" id="mp-error-324" data-main="#docNumber"><?php echo esc_html__( 'Invalid Document Number' ); ?></span>
									<span class="mp-error mp-mt-5" id="mp-error-E301" data-main="#docNumber"><?php echo esc_html__( 'Invalid Document Number' ); ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- NOT DELETE LOADING-->
				<div id="mp-box-loading"></div>

			</div>
		</div>

		<div id="mercadopago-utilities">
			<input type="hidden" id="mp-amount" value='<?php echo esc_textarea( $amount ); ?>' name="mercadopago_custom[amount]" />
			<input type="hidden" id="currency_ratio" value='<?php echo esc_textarea( $currency_ratio ); ?>' name="mercadopago_custom[currency_ratio]" />
			<input type="hidden" id="campaign_id" name="mercadopago_custom[campaign_id]" />
			<input type="hidden" id="campaign" name="mercadopago_custom[campaign]" />
			<input type="hidden" id="mp-discount" name="mercadopago_custom[discount]" />
			<input type="hidden" id="paymentMethodId" name="mercadopago_custom[paymentMethodId]" />
			<input type="hidden" id="token" name="mercadopago_custom[token]" />
			<input type="hidden" id="mp_checkout_type" name="mercadopago_custom[checkout_type]" value="custom" />
		</div>

	</div>
</div>
<script type="text/javascript">
var card = new Card({
    form: 'form.checkout',
    container: '.card-container',

});
</script>