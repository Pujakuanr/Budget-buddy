// Show/Hide 'Other' category input field based on the selected category
document.getElementById('category-select').addEventListener('change', function() {
    const otherCategory = document.getElementById('other-category');
    if (this.value === 'Others') {
       otherCategory.style.display = 'block';
       otherCategory.required = true;
    } else {
       otherCategory.style.display = 'none';
       otherCategory.required = false;
    }
 });
 
 // Expense check for daily limit
 const form = document.getElementById('expense-form');
 const worryMessage = document.getElementById('worry-message');
 const dailyLimit = 1000;  // Set a limit for daily expense
 
 form.addEventListener('submit', function(e) {
    const amount = parseFloat(document.getElementById('expense-amount').value);
    
    // Simple check to display message if daily expense limit exceeds
    if (amount > dailyLimit) {
       e.preventDefault();
       worryMessage.classList.remove('hidden');
    } else {
       worryMessage.classList.add('hidden');
    }
 });
 