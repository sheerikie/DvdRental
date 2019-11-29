import { mount } from '@vue/test-utils';
import LoginComponent from '../../../resources/js/components/Auth/LoginComponent.vue';
import expect from 'expect';

describe('LoginComponent.vue', () => {
  it('says Login To Zeraki Store', () => {
    const wrapper = mount(LoginComponent);
    expect(wrapper.html()).toContain('Login To Zeraki Store');
  });
});