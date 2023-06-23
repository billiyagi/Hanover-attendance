<script>
    let ligthButton = document.getElementById('ligthButton');
    let darkButton = document.getElementById('DarkButton');

    // Automate theme
    if (localStorage.getItem('theme') == 'dark') {
        // Dark
        document.querySelector('html').setAttribute('data-theme', 'dark');

        document.querySelectorAll('#hanoverLogoLight').forEach((logoLight) => {
            logoLight.style.display = 'block';
        });
        document.querySelectorAll('#hanoverLogoDark').forEach((logoDark) => {
            logoDark.style.display = 'none';
        });



        document.querySelector('body').classList.remove('bg-gray-200');
        document.querySelectorAll('.bg-white').forEach((result) => {
            result.classList.replace('bg-white', 'bg-white');
        })

    } else if (localStorage.getItem('theme') == 'light') {
        // Light
        document.querySelector('html').setAttribute('data-theme', 'light');

        document.querySelector('#modeChecked').setAttribute('checked', true);

        document.querySelectorAll('#hanoverLogoLight').forEach((logoLight) => {
            logoLight.style.display = 'none';
        });
        document.querySelectorAll('#hanoverLogoDark').forEach((logoDark) => {
            logoDark.style.display = 'block';
        });


        document.querySelector('body').classList.add('bg-gray-200');
        document.querySelectorAll('.bg-base-300').forEach((result) => {
            result.classList.replace('bg-base-300', 'bg-white');
        })



    } else {
        let theme = 'light';
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            theme = 'dark';
        }
        document.querySelector('html').setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
    }

    // Button To Light
    ligthButton.addEventListener('click', function() {
        document.querySelector('html').setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
        document.querySelector('#hanoverLogoLight').style.display = 'none';
        document.querySelector('#hanoverLogoDark').style.display = 'block';

        document.querySelector('body').classList.add('bg-gray-200');
        document.querySelectorAll('.bg-base-300').forEach((result) => {
            result.classList.replace('bg-base-300', 'bg-white');
        })
    });

    // Button To Dark
    darkButton.addEventListener('click', function() {
        document.querySelector('html').setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
        document.querySelector('#hanoverLogoLight').style.display = 'block';
        document.querySelector('#hanoverLogoDark').style.display = 'none';

        document.querySelector('body').classList.remove('bg-gray-200');
        document.querySelectorAll('.bg-white').forEach((result) => {
            result.classList.replace('bg-white', 'bg-base-300');
        })
    });
</script>
<footer class="md-0 md:ms-60 bg-base-200 px-10 py-5">
    <span>&copy; {{ date('Y') }} Billy System by <a href="https://github.com/billiyagi">Febry Billiyagi</a></span>
</footer>
