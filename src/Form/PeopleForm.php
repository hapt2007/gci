<?php
namespace Drupal\people_form\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\Messenger;
/**
 * Implements form.
 */
class PeopleForm extends FormBase {
/**
 * {@inheritdoc}
 */
  public function getFormId() {
    return 'people_form';
  }
/**
 * {@inheritdoc}
 */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['people_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name:'),
      '#required' => TRUE,
    ];
    $form['people_age'] = [
      '#type' => 'number',
      '#title' => $this->t('Age:'),
    ];
    $form['people_dob'] = [
      '#type' => 'date',
      '#title' => $this->t('DOB:'),
    ];
    $form['people_gender'] = [
      '#type' => 'select',
      '#title' => ('Gender:'),
      '#options' => [
        'Female' => $this->t('Female'),
        'Male' => $this->t('Male'),
        'Other' => $this->t('Other'),
        'Prefer Not Say' => $this->t('Prefer Not Say'),
      ],
    ];
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    ];
    return $form;
  }
/**
 * {@inheritdoc}
 */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $messenger = Drupal::messenger();
    $messanger->addMessage('Here is the information you provided:');
    $messanger->addMessage('Name: ' . $form_state->getValue('people_name'));
    $messanger->addMessage('Name: ' . $form_state->getValue('people_name'));
    $messanger->addMessage('Age: ' . $form_state->getValue('people_age'));
    $messanger->addMessage('Gender: ' . $form_state->getValue('people_gender'));
    $messanger->addMessage('Date of Birth: ' . date("d-m-Y", strtotime($form_state->getValue('people_dob'))));
  }
}
