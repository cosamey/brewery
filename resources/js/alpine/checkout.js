import { loadStripe } from '@stripe/stripe-js';

export default (apiKey, intentSecret, returnUrl, state) => ({
  stripe: null,

  elements: null,

  isProcessing: false,

  error: null,

  async init() {
    this.stripe = await loadStripe(apiKey, { locale: 'sk' });

    this.elements = this.stripe.elements({
      clientSecret: intentSecret,
    });

    const payment = this.elements.create('payment', {
      fields: {
        billingDetails: 'never',
      },
      terms: {
        card: 'never',
      },
    });
    payment.mount('#payment-element');
  },

  async pay() {
    this.isProcessing = true;
    this.error = null;

    await this.stripe
      .confirmPayment({
        elements: this.elements,
        confirmParams: {
          return_url: returnUrl,
          payment_method_data: {
            billing_details: {
              name: state.purchasingAsCompany
                ? state.customer.company.name
                : `${state.customer.firstName} ${state.customer.lastName}`,
              email: state.customer.email,
              phone: state.customer.phone,
              address: {
                line1: state.sameAddress
                  ? state.shippingAddress.street
                  : state.billingAddress.street,
                line2: null,
                city: state.sameAddress
                  ? state.shippingAddress.city
                  : state.billingAddress.city,
                postal_code: state.sameAddress
                  ? state.shippingAddress.postCode
                  : state.billingAddress.postCode,
                state: null,
                country: state.sameAddress
                  ? state.shippingAddress.countryCode
                  : state.billingAddress.countryCode,
              },
            },
          },
        },
      })
      .then((result) => {
        this.isProcessing = false;

        if (result.error) {
          this.error = result.error.message;
        }
      })
      .catch((error) => {
        this.isProcessing = false;

        console.error(error);
      });
  },
});
