
function mpCreditExecmascara() {
	v_obj.value = v_fun(v_obj.value)
}
//Card mask date input
function mpCreditMaskDate(o, f) {
	v_obj = o
	v_fun = f
	setTimeout("mpCreditExecmascara()", 1);
}
function mpMcc(value) {
	if(mpIsMobile()){
			return value;
		}
		value = value.replace(/\D/g, "");
		value = value.replace(/^(\d{4})(\d)/g, "$1 $2");
		value = value.replace(/^(\d{4})\s(\d{4})(\d)/g, "$1 $2 $3");
		value = value.replace(/^(\d{4})\s(\d{4})\s(\d{4})(\d)/g, "$1 $2 $3 $4");
		return value;
	}

	function mpDate(v) {
		v = v.replace(/\D/g, "");
		v = v.replace(/(\d{2})(\d)/, "$1/$2");
		v = v.replace(/(\d{2})(\d{2})$/, "$1$2");
		return v;
	}

	// Explode date to month and year
	function mpValidateMonthYear() {
		var date = document.getElementById('mp-card-expiration-date').value.split('/');
		document.getElementById('cardExpirationMonth').value = date[0];
		document.getElementById('cardExpirationYear').value = date[1];
	}

	function mpInteger(v) {
		return v.replace(/\D/g, "");
	}

	function mpIsMobile() {
		try{
			document.createEvent("TouchEvent");
			return true;
		}catch(e){
			return false;
		}
	}

	function submitWalletButton(event) {
		event.preventDefault();
		jQuery('#mp_checkout_type').val('wallet_button');
		jQuery('form.checkout, form#order_review').submit();
	}
	
	//Card mask date input
	function mpMaskInput(o, f) {
		v_obj = o
		v_fun = f
		setTimeout("mpTicketExecmascara()", 1);
	}

	function mpTicketExecmascara() {
		v_obj.value = v_fun(v_obj.value)
	}

	function mpTicketInteger(v) {
		return v.replace(/\D/g, "")
	}

	function mpCpfCnpj(v, element) {
		v = v.replace(/\D/g, "")

		if (v.length <= 11) { //CPF
			document.getElementById('mp_cpf_cnpj_label').innerHTML = 'CPF/CNPJ <em>*</em>'

			v = v.replace(/(\d{3})(\d)/, "$1.$2")
			v = v.replace(/(\d{3})(\d)/, "$1.$2")
			v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2")

			if (v.length == 14) {
				document.getElementById('mp_cpf_cnpj_label').innerHTML = 'CPF <em>*</em>'
			}

		} else { //CNPJ
			document.getElementById('mp_cpf_cnpj_label').innerHTML = 'CNPJ <em>*</em>'

			v = v.replace(/^(\d{2})(\d)/, '$1.$2');
			v = v.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
			v = v.replace(/\.(\d{3})(\d)/, '.$1/$2');
			v = v.replace(/(\d{4})(\d)/, '$1-$2');
		}

		return v
	}
	
jQuery(document).ready(function($) {
var mpCpf = $("#billing_cpf");
var handleFieldsMP = function () {
$("#mp_doc_number").val(mpCpf.val());
};
$('form[name="checkout"]').focusout(handleFieldsMP);
$('form[name="checkout"]').focusin(handleFieldsMP);
$(".payment_method_woo-mercado-pago-ticket").click(handleFieldsMP);
handleFieldsMP();
});