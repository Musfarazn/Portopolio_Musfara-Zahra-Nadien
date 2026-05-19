document.addEventListener('DOMContentLoaded', function () {
    const postsContainer = document.getElementById('posts-container');
    const addPostForm = document.getElementById('addPostForm');

    // Menambahkan variabel untuk menyimpan tombol yang terakhir kali diklik
    let lastClickedBtn = null;

    const addPostToDOM = (post) => {
        const postElement = document.createElement('div');
        postElement.classList.add('post');

        const postHTML = `
            <h3>${post.title}</h3>
            <p>Penulis: ${post.author}</p>
            <p>${post.content}</p>
            <button class="like-btn"><img src="./images/logo-like.png" alt="Like"></button>
            <button class="unlike-btn"><img src="./images/logo-unlike.png" alt="Unlike"></button>
        `;

        postElement.innerHTML = postHTML;
        postsContainer.appendChild(postElement);

        // Tambahkan event listener untuk setiap tombol
        const likeBtn = postElement.querySelector('.like-btn');
        const unlikeBtn = postElement.querySelector('.unlike-btn');

        likeBtn.addEventListener('click', function () {
            // Nonaktifkan tombol Unlike
            if (lastClickedBtn) {
                lastClickedBtn.disabled = false;
            }
            
            // Menonaktifkan tombol Like
            likeBtn.disabled = true;
            lastClickedBtn = likeBtn;

            // TODO: Implementasi aksi Like
            console.log('Liked:', post.title);
        });

        unlikeBtn.addEventListener('click', function () {
            // Nonaktifkan tombol Like
            if (lastClickedBtn) {
                lastClickedBtn.disabled = false;
            }

            // Menonaktifkan tombol Unlike
            unlikeBtn.disabled = true;
            lastClickedBtn = unlikeBtn;

            // TODO: Implementasi aksi Unlike
            console.log('Unliked:', post.title);
        });
    };

    postsContainer.addEventListener('click', function (event) {
        const target = event.target;
        if (target.classList.contains('like-btn')) {
            // Implementasi aksi Like
            console.log('Liked:', target.closest('.post').querySelector('h3').textContent);
        } else if (target.classList.contains('unlike-btn')) {
            // Implementasi aksi Unlike
            console.log('Unliked:', target.closest('.post').querySelector('h3').textContent);
        }
    });


    const fetchAndDisplayPosts = () => {
        // Simulasi data postingan
        const postsData = [
            { title: 'Hidup dengan Gangguan Bipolar: Pengalaman Pribadi', 
            author: 'Rendi',
            content: 'Hai semuanya, saya ingin berbagi pengalaman saya hidup dengan gangguan bipolar. Setiap hari adalah perjuangan, terkadang saya merasa begitu rendah dan sedih, sulit untuk bangun dari tempat tidur. Namun, ada juga hari-hari di mana saya penuh energi, sulit untuk diam, dan berpikir bahwa saya bisa melakukan apapun. Ini adalah perjalanan yang melelahkan, tetapi saya terus berjuang. Saya ingin mengatakan kepada semua orang yang mungkin mengalami hal serupa, Anda tidak sendirian. Saya tahu betapa sulitnya menjalani kehidupan sehari-hari dengan gangguan bipolar, tetapi penting untuk mencari bantuan dan dukungan. Saya telah menemukan terapi dan obat-obatan yang membantu saya mengelola kondisi ini. Jangan pernah ragu untuk mencari pertolongan. Dan bagi mereka yang mungkin tidak mengerti gangguan bipolar, saya harap Anda dapat mendengarkan dan mencoba memahami pengalaman kami. Dukungan dan pengertian dari orang-orang di sekitar sangat berarti bagi kami yang hidup dengan gangguan bipolar.', 
            },
            { title: 'Hidup dengan Gangguan Depresi: Pengalaman Pribadi', 
            author: 'Virdha',
            content: 'Hai semuanya, saya ingin berbagi pengalaman saya hidup dengan gangguan depresi. Setiap hari adalah perjuangan, terkadang saya merasa begitu rendah dan sedih, sulit untuk bangun dari tempat tidur. Namun, ada juga hari-hari di mana saya penuh energi, sulit untuk diam, dan berpikir bahwa saya bisa melakukan apapun. Ini adalah perjalanan yang melancarkan, tetapi saya terus berjuang. Saya ingin mengatakan kepada semua orang yang mungkin mengalami hal serupa, Anda tidak sendirian. Saya tahu betapa sulitnya menjalani kehidupan sehari-hari dengan gangguan depresi, tetapi penting untuk mencari bantuan dan dukungan. Saya telah menemukan terapi dan obat-obatan yang membantu saya mengelola kondisi ini.Jangan pernah ragu untuk mencari pertolongan. Dan bagi mereka yang mungkin tidak mengerti gangguan depresi, saya harap Anda dapat mendengarkan dan mencocih pengalaman kami. Dukungan dan pengertian dari orang-orang di sekitar sangat berarti bagi kami yang hidup dengan gangguan depresi.'
            }
            // Tambahkan postingan lainnya jika diperlukan
        ];

        postsData.forEach((post) => {
            addPostToDOM(post);
        });
    };

    fetchAndDisplayPosts();

    addPostForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const postTitle = document.getElementById('postTitle').value;
        const postAuthor = document.getElementById('postAuthor').value;
        const postContent = document.getElementById('postContent').value;

        const newPost = { title: postTitle, author: postAuthor,content: postContent };
        addPostToDOM(newPost);

        addPostForm.reset();
    });


});
