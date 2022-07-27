var usersArr = [
    {username: 'Jan Kowalski', birthYear: 1983, salary: 4200},
    {username: 'Anna Nowak', birthYear: 1994, salary: 7500},
    {username: 'Jakub Jakubowski', birthYear: 1985, salary: 18000},
    {username: 'Piotr Kozak', birthYear: 2000, salary: 4999},
    {username: 'Marek Sinica', birthYear: 1989, salary: 7200},
    {username: 'Kamila Wiśniewska', birthYear: 1972, salary: 6800},
    {username: 'Damian Śnieda', birthYear: 1997, salary: 7500},
    ];

function welcomeUsers(array)
{
    array.forEach(person => {        
        if (person['salary'] > 15000)
        {
            console.log("Witaj, prezesie!");
            return;
        }
        if (person['salary'] < 5000)
        {
            console.log(person['username'] + ", szykuj się na podwyżkę!")
            return;
        }
        if (person['birthYear'] % 2 == 0)
        {
            var obliczony_wiek_rocznikowy = new Date().getFullYear() - person['birthYear'];
            console.log("Witaj, " + person['username'] + "! W tym roku kończysz " + obliczony_wiek_rocznikowy + " lat!");
        }
        else{
            console.log(person['username'] + ", jesteś zwolniony!");
        }
    });
}

welcomeUsers(usersArr);