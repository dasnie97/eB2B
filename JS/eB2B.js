var usersArr = [
    {username: 'Jan Kowalski', birthYear: 1983, salary: 4200},
    {username: 'Anna Nowak', birthYear: 1994, salary: 7500},
    {username: 'Jakub Jakubowski', birthYear: 1985, salary: 18000},
    {username: 'Piotr Kozak', birthYear: 2000, salary: 4999},
    {username: 'Marek Sinica', birthYear: 1989, salary: 7200},
    {username: 'Kamila Wiśniewska', birthYear: 1972, salary: 6800},
    ];

function welcomeUsers(array)
{
    array.forEach(element => {
        var message = null;
        for (const[key, value] of Object.entries(element))
        {
            switch (key) {
                case 'salary':
                    if (value > 15000)
                    {
                        message = "Witaj, prezesie!"
                    }
                    if (value < 5000)
                    {
                        message = element['username'] + ", szykuj się na podwyżkę!"
                    }
                    break;
                case 'birthYear':
                    if (value % 2 == 0)
                    {
                        var obliczony_wiek_rocznikowy = new Date().getFullYear() - element['birthYear'];
                        message = "Witaj, " + element['username'] + "! W tym roku kończysz " + obliczony_wiek_rocznikowy + " lat!";
                    }
                    else{
                        message = element['username'] + ", jesteś zwolniony!";
                    }
                    break;
                default:
                    break;
            }
        }
        console.log(message);
    });
}

welcomeUsers(usersArr);