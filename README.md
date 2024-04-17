Test Details:
- Create a new Laravel and Livewire application (you can use the latest version)
- Create a 2 page form (livewire form so both pages are on the same URL route). First page should have Next button, the second page should have Previous and Submit buttons. (Previous goes to page 1, where it should keep all of the form input user entered, the submit button submits the form, etc...)
- Page 1 fields:
- First name
- Last name
- Address
- City
- Country
- Date of birth (3 separate select fields month/day/year) - on the backend combine these so it's easy to save as date time field in MySQL.
- Page 2 fields:
- "Are you married?" - Yes/No
- If Yes, the following fields show up conditionally:
- Date of marriage - same logic as Date of birth (If date of marriage occurred before the user was 18 years old, show an error message "You are not eligible to apply because your marriage occurred before your 18th birthday." and do not allow submission of form.)
- Country of marriage
- If No, the following fields show up conditionally:
- Are you widowed? Yes/No
- Have you ever been married in the past? Yes/No
Submit - Form submission should show a white page with output of the form results.