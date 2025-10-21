const questions = document.querySelectorAll('.faq-question');

questions.forEach(question => {
  question.addEventListener('click', () => {
    
    const answer = question.nextElementSibling;

    question.classList.toggle('active');
    answer.classList.toggle('active');
  });
});
