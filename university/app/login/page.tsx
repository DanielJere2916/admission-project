import type { Metadata } from "next"
import Navbar from "../components/Navbar"
import Footer from "../components/Footer"
import LoginForm from "../components/LoginForm"

export const metadata: Metadata = {
  title: "Login | University Admissions Portal",
  description: "Access your account on the University Admissions Portal",
}

export default function Login() {
  return (
    <main className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      <Navbar />
      <div className="pt-24 pb-16">
        <div className="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
          <LoginForm />
        </div>
      </div>
      <Footer />
    </main>
  )
}

