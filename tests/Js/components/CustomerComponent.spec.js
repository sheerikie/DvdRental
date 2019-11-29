import { mount } from '@vue/test-utils';
import CustomerComponent from '../../../../resources/js/components/Customer/IndexCustomerComponent.vue';
import expect from 'expect';

describe('CustomerComponent.vue', () => {
  test('it should display the right number of table rows', () => {
    const wrapper = mount(CustomerComponent);
    expect(
      wrapper.findAll('[data-test="fake-table-row"]').wrappers.length
    ).toBe(4);
  });
});