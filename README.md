# Next update

-   Register
-   Sebagai admin esi
-   -   Dapat akses menu manajemen dari semua user
-   -   Dapat akses menu squad dari semua user
-   -   Dapat akses menu event dari semua user
-   -   Dapat membuat manajemen dan invite squad
-   -   Dapat membuat squad dan invite player
-   -   Dapat membuat event, invite squad, tim partisipan dan pemenang event
-   Sebagai user
-   -   Dapat mempunyai beberapa akun game (player)
-   -   Dapat membuat squad dan invite player
-   -   Dapat membuat event (kelola event, invite squad, tim partisipan, pemenang event)
-   Sebagai manajemen
-   -   Dapat membuat squad dan invite player
-   -   Dapat membuat event (kelola event, invite squad, tim partisipan, pemenant event)

# next update

-   pagination untuk semua halaman
-   fitur pencarian
-   periksa middleware untuk setiap menu, caranya coba fitur lalu set middleware
-   Testing
    -- register 3 level user
    -- login
-   crud player
-   crud squad (saat hapus squad set squad dari user = null)
    -- crud player dan squad
    --- crud invite player (squad)
    --- list invite squad (player)
    --- crud request join squad (player)
    --- list request join squad (squad)
-   crud management (saat hapus management maka set squad.management_id == null)
    -- crud invite squad (management)
    -- list invite from management (squad)
    -- list request join to management (squad)
    -- list request join management from squad (management)
-   event
    -- invite teams
    -- list invite teams (squad)
    -- event teams
    -- event winner

# Progress

-   url()->current() == env('URL') . '/events'

# Upload

-   disable prefix angggota web.php
-   edit file env('URL') ubah ke https://esisumbawa.or.id/anggota
-   isi public copy ke root folder
-   ubah index.php
-   ubah assets menjadi anggota/public/assets
