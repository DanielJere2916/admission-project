import type { Metadata } from "next"
import Navbar from "../components/Navbar"
import Footer from "../components/Footer"
import StudentLifeHero from "../components/StudentLifeHero"
import StudentActivities from "../components/StudentActivities"
import CampusEvents from "../components/CampusEvents"
import StudentTestimonials from "../components/StudentTestimonials"

export const metadata: Metadata = {
  title: "Student Life | University Admissions Portal",
  description: "Experience the vibrant and diverse student life at our university.",
}

export default function StudentLife() {
  return (
    <main className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      <Navbar />
      <StudentLifeHero />
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <StudentActivities />
        <CampusEvents />
        <StudentTestimonials />
      </div>
      <Footer />
    </main>
  )
}

