public function submit_form() {
    // Load the Contact_us model
    $this->load->model('Contact_us');

    // Get the form data
    $name = $this->input->post('name');
    $email = $this->input->post('email');
    $message = $this->input->post('message');

    // Save the form data to the database
    $this->Contact_us->save([
        'name' => $name,
        'email' => $email,
        'message' => $message
    ]);

    // Redirect the user to a thank you page
    redirect('contact_us/thank_you');
}
