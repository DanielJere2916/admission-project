import type { Metadata } from "next"
import Navbar from "../components/Navbar"
import Footer from "../components/Footer"
import CampusesList from "../components/CampusesList"

export const metadata: Metadata = {
  title: "Our Campuses | University Admissions Portal",
  description: "Explore our diverse campuses, faculties, and programs across the university.",
}

export default function Campuses() {
  return (
    <main className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      <Navbar />
      <div className="pt-24 pb-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 className="text-5xl font-bold text-center mb-4 text-gray-800">Our Campuses</h1>
          <p className="text-xl text-center mb-12 text-gray-600 max-w-3xl mx-auto">
            Discover the diverse academic environments and opportunities across our university campuses.
          </p>
          <CampusesList />
        </div>
      </div>
      <Footer />
    </main>
  )
}

