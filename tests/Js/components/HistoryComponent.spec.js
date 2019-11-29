import { mount } from '@vue/test-utils';
import HistoryComponent from '../../../../resources/js/components/Dvd/IndexHistoryComponent.vue';
import expect from 'expect';

describe('HistoryComponent.vue', () => {
  test('it should display the right number of table rows', () => {
    const wrapper = mount(HistoryComponent);
    expect(
      wrapper.findAll('[data-test="fake-table-row"]').wrappers.length
    ).toBe(8);
  });
});