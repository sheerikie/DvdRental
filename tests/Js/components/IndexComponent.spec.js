import { mount } from '@vue/test-utils';
import IndexComponent from '../../../../resources/js/components/IndexComponent.vue';
import expect from 'expect';

describe('IndexComponent.vue', () => {
  it('says welcome to zeraki stores', () => {
    const wrapper = mount(IndexComponent);
    expect(wrapper.html()).toContain('Welcome To Zeraki Stores');
  });
});