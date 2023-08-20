/*
 Add classes for the subscription form
 It adds 'form-control' for each inputs
 */
const subcriptionForm = document.querySelector('form[name="registration_form"]')
const inputs = subcriptionForm.querySelectorAll('div > input')

inputs.forEach(element => {
  element.classList.add('class')
  element.setAttribute('class', 'form-control')
});

const userForm = document.querySelector('form[name="user"]')
const inputsUser = subcriptionForm.querySelectorAll('div > input')

inputsUser.forEach(element => {
  element.classList.add('class')
  element.setAttribute('class', 'form-control')
});