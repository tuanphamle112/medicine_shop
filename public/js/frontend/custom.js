function clickLogoutForm(selectorID, textCormfirm) {
	if (!confirm(textCormfirm)) return;
	$(selectorID).submit();
}
