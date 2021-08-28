import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home";
import About from "../views/About";
import Contact from "../views/Contact";
import Login from "../views/auth/Login";
import Register from "../views/auth/Register";
import Kelas from "../views/kelas/Table";
import KelasCreate from "../views/kelas/Create";
import EditKelas from "../views/kelas/Edit";
import JenisBuku from "../views/jenisbuku/Table";
import Siswa from "../views/siswa/Table";
import SiswaCreate from "../views/siswa/Create";
import SiswaEdit from "../views/siswa/Edit";
import Buku from "../views/buku/Table";
import BukuCreate from "../views/buku/Create";
import BukuEdit from "../views/buku/Edit";
import JenisBukuCreate from "../views/jenisbuku/Create";
import JenisBukuEdit from "../views/jenisbuku/Edit";
import Peminjaman from "../views/peminjaman/Table";
import PeminjamanCreate from "../views/peminjaman/Create";
import PeminjamanEdit from "../views/peminjaman/Edit";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/about",
    name: "About",
    component: About,
  },
  {
    path: "/contact",
    name: "Contact",
    component: Contact,
  },
  {
    path: "/login",
    name: "login",
    component: Login,
  },
  {
    path: "/register",
    name: "register",
    component: Register,
  },
  {
    path: "/kelas",
    name: "kelas.index",
    component: Kelas,
  },
  {
    path: "/kelas-create",
    name: "kelas.create",
    component: KelasCreate,
  },
  {
    path: "/edit-kelas/:id/edit",
    name: "kelas.edit",
    component: EditKelas,
  },
  {
    path: "/jenisbuku",
    name: "jenisbuku.index",
    component: JenisBuku,
  },
  {
    path: "/create-jenisbuku",
    name: "jenisbuku.create",
    component: JenisBukuCreate,
  },
  {
    path: "/edit-jenis-buku/:id/edit",
    name: "jenisbuku.edit",
    component: JenisBukuEdit,
  },
  {
    path: "/siswa",
    name: "siswa.index",
    component: Siswa,
  },
  {
    path: "/siswa-create",
    name: "siswa.create",
    component: SiswaCreate,
  },
  {
    path: "/edit-siswa/:id/edit",
    name: "siswa.edit",
    component: SiswaEdit,
  },
  {
    path: "/buku",
    name: "buku.index",
    component: Buku,
  },
  {
    path: "/create-buku",
    name: "create.buku",
    component: BukuCreate,
  },
  {
    path: "/edit-buku/:id/edit",
    name: "buku.edit",
    component: BukuEdit,
  },
  {
    path: "/peminjaman",
    name: "peminjaman.index",
    component: Peminjaman,
  },
  {
    path: "/peminjaman-create",
    name: "peminjaman.create",
    component: PeminjamanCreate,
  },
  {
    path: "/edit-peminjaman/:id/edit",
    name: "peminjaman.edit",
    component: PeminjamanEdit,
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
  linkActiveClass: "active",
});

export default router;
