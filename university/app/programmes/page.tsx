import Navbar from "../components/Navbar"
import Footer from "../components/Footer"
import ProgrammesList from "../components/ProgrammesList"
import type { Metadata } from "next"
import ProgrammeSearch from "../components/ProgrammeSearch"

export const metadata: Metadata = {
  title: "Our Programmes | University Admissions Portal",
  description: "Explore our diverse range of academic programmes across various faculties.",
}

export default function Programmes() {
  return (
    <main className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      <Navbar />
      <div className="pt-24 pb-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 className="text-5xl font-bold text-center mb-4 text-gray-800">Our Programmes</h1>
          <p className="text-xl text-center mb-12 text-gray-600 max-w-3xl mx-auto">
            Discover a world of opportunities with our diverse range of academic programmes. Choose your path to
            excellence and innovation.
          </p>
          <ProgrammesList />
        </div>
      </div>
      <ProgrammeSearch />
      <Footer />
    </main>
  )
}

