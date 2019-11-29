import { mount } from '@vue/test-utils';
import DvdComponent from '../../../../resources/js/components/Dvd/IndexDvdComponent.vue';
import expect from 'expect';

describe('DvdComponent.vue', () => {
  test('it should display the right number of table rows', () => {
    const wrapper = mount(DvdComponent);
    expect(
      wrapper.findAll('[data-test="fake-table-row"]').wrappers.length
    ).toBe(4);
  });
});