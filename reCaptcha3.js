class ReCaptcha3 {
    constructor(inputSelector) {
        this.siteKey = 'captchaPublicKey';
        this.inputSelector = inputSelector;
        this.generateKey();
    }
    generateKey() {
        grecaptcha.ready(() => {
            grecaptcha.execute(this.siteKey, {action: 'homepage'}).then((token) => {
                let inputs = document.querySelectorAll(this.inputSelector)
                for (let input of inputs) {
                    input.value = token
                }
            });
        });
    }
}





