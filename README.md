# SMTP Email Sender

This is a simple SMTP email sending system built with **PHP** and **PHPMailer**. It allows you to send emails via SMTP by entering the necessary email credentials and message content.

## Features
- Send email through **SMTP** (TLS/SSL encryption).
- Dynamic form for inputting SMTP credentials, recipient email, subject, and body.
- Includes error and success message handling.
- Responsive design for desktop and mobile devices.

## Requirements
- PHP 7.2 or higher
- PHPMailer library (included)
- Internet connection for SMTP server interaction

## Setup

1. **Clone the repository**:
   ```bash
   git clone https://github.com/sinhalaya/SMTP-Email-Sender.git
   ```

2. **Install PHPMailer**:
   If you prefer not to use Composer, the PHPMailer library is included in the project. Ensure the following files are in the same directory:
   - `PHPMailer/src/PHPMailer.php`
   - `PHPMailer/src/SMTP.php`
   - `PHPMailer/src/Exception.php`

3. **Configure SMTP Credentials**:
   Edit the `email_form.php` file to set the following details:
   - `smtp_host` (e.g., `mail.example.com`)
   - `smtp_port` (e.g., `587` or `465`)
   - `smtp_user` (your SMTP username, e.g., `name@example.com`)
   - `smtp_pass` (your SMTP password)
   - `smtp_secure` (set to `ssl` or `tls`)
   - `from_email` (the sending email address, e.g., `name@example.com`)

4. **Run the project**:
   Open the `email_form.php` file in your browser, and fill out the form with the recipient's email, subject, and message to send an email.

   Example URL:  
   ```http
   http://localhost/smtp-email-sender/email_form.php
   ```

## How It Works

1. **User Input**: The user fills out the form with SMTP credentials, recipient email, subject, and message.
2. **Send Email**: Upon form submission, the PHP script uses PHPMailer to connect to the SMTP server and sends the email.
3. **Success/Failure Handling**: The script displays a success or failure message based on whether the email was sent successfully.

## UI/UX

- The interface is **clean, simple, and responsive**.
- It includes clear, **user-friendly success and error messages**.
- **Hover effects** on the submit button and input fields to enhance the user experience.

## Screenshots

**SMTP Email Sender Interface:**

![Email Sender Screenshot](https://github.com/sinhalaya/SMTP-Email-Sender/blob/main/smtp.jpg) <!-- Replace with an actual screenshot -->

## Contributing

Feel free to fork the repository, submit issues, or create pull requests. Contributions are welcome!

### To contribute:
1. Fork the repository
2. Create a new branch (`git checkout -b feature-branch`)
3. Make your changes
4. Commit your changes (`git commit -am 'Add new feature'`)
5. Push to the branch (`git push origin feature-branch`)
6. Create a pull request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

### 📝 Acknowledgments:
- **PHPMailer**: A powerful email-sending library for PHP.
- **SMTP Servers**: Ensure your SMTP server details are correct for successful email sending.

