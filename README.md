Project Report:

Task 1 – User registration

The application includes a user authentication system. Passwords are stored securely using
hashed representations, and user input is sanitized to prevent SQL injection attacks. Sessions are
used to maintain user state across different pages securely.
Registration feature code screenshots

Database Table

Why do you think it is secure? Use bullet points to provide your reasons and back it up with code snippet from your
application. Don’t paste the big junks of code in the report, show us those specific lines, highlight, and annotate if you need
to.
All user data is stored in a structured database with appropriate security measures such as
encryption at rest and access controls that limit database access to authorized personnel only.
- Sensitive information stored in secure database.
- Used prepared statements for database insertion to prevent SQL injection.
- Implemented server-side validation for email and password fields
- Passwords blanked out when typing.
Task 2 - Develop a secure login feature.
Login feature code screenshots

Why do you think it is secure? Use bullet points to provide your reasons and back it up code snippet from your
application.
- Secure login system allowing users to access their accounts with their credentials.
- Session management to keep users logged in across different pages.
- Passwords are verified using password_verify() to enhance security
- Session variables are set after successful login for secure user session management
- Measures to prevent SQL injection
Task 3 - Implement password strength and password recovery

A password recovery system has been implemented to allow users to reset their passwords securely.
This includes email verification and token-based authentication to ensure that password resets are
only performed by the legitimate account owner.

List each password policy element that you implemented and back it up with code snippets from
your application.
- Password recovery implemented, enter email address, receive a recovery link via email.

- Generated a unique token for password resets, which is stored securely
- phpMailer to automate email.
Task 4 - Implement a “Evaluation Request” web page.

This feature is intended to allow users to request professional appraisals of items they believe to be
antiques. The secure submission form would collect descriptions and other pertinent details about
the items to facilitate the evaluation process.
While this feature is currently in the planning phase, security measures that would be incorporated
into its implementation include:
- Input Validation and Sanitization: To protect against injection attacks, all user inputs would
be strictly validated and sanitized both on the client and server side.
- Authentication Checks: Submission of evaluation requests would be limited to authenticated
users, ensuring accountability and traceability.
- Rate Limiting: To prevent spamming of requests, rate limiting would be applied to the
submission process.
Task 5 - Develop a feature that will allow customers to submit photographs

Due to time constraints, the feature to submit photographs was not implemented. However, if
implemented, the security considerations would include:
- Client-Side Validation: To ensure that the files selected by the user meet our specifications
before they are uploaded. This would include checks for file size and acceptable file formats
(e.g., only .jpg, .png, .gif).
- Server-Side Validation: As a second layer of defence, server-side validation would also check
the file type and size. Files would also be scanned for potential malware or malicious content
using server-side antivirus software.

- Storage and Retrieval: Images would be stored outside the web root to prevent direct
access. Secure methods would be used to retrieve and serve images when needed.
- Unique Filenames: To avoid conflicts and potential overwriting of files, each uploaded file
would be renamed with a unique identifier, which could also prevent direct access guessing
of filenames.
- Limited Upload Size: To prevent DoS attacks that might be caused by extremely large file
uploads, a limit would be set on the maximum file size.

Task 6 – Request Listing Page

When developed, the "Request Listing Page" will incorporate several security measures to protect
sensitive data and ensure the seamless operation of the service:

- Access Control: The page will be accessible only to users with administrative privileges,
enforced through robust authentication and authorization checks.
- Data Protection: Displayed information will be filtered to prevent exposure of sensitive user
data, implementing the principle of least privilege.
Task 7 – AWS Virtual Private Cloud settings screenshots.
Screenshots of AWS settings.
