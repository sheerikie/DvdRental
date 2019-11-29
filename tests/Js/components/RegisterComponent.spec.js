import { mount } from '@vue/test-utils';
import RegisterComponent from '../../../resources/js/components/RegisterComponent.vue';
import expect from 'expect';

describe('RegisterComponent.vue', () => {
  it('says Register To Zeraki Store', () => {
    const wrapper = mount(RegisterComponent);
    expect(wrapper.html()).toContain('Register To Zeraki Store');
  });
});