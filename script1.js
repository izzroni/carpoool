document.getElementById('search-btn').addEventListener('click', () => {
  const leavingFrom = document.getElementById('leaving-from').value;
  const goingTo = document.getElementById('going-to').value;
  const date = document.getElementById('date').value;
  const passengers = document.getElementById('passengers').value;

  if (leavingFrom && goingTo && date && passengers) {
    alert(`Searching for trips from ${leavingFrom} to ${goingTo} on ${date} for ${passengers} passenger(s).`);
  } else {
    alert('Please fill in all fields.');
  }
});
