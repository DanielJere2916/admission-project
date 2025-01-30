import type { Metadata } from "next"
import Navbar from "../components/Navbar"
import Footer from "../components/Footer"
import SelectedStudentsList from "../components/SelectedStudentsList"

export const metadata: Metadata = {
  title: "Selected Students | University Admissions Portal",
  description: "View the list of students selected for admission, sorted by faculty and program.",
}

export default function SelectedStudents() {
  return (
    <main className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      <Navbar />
      <div className="pt-24 pb-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 className="text-5xl font-bold text-center mb-4 text-gray-800">Selected Students</h1>
          <p className="text-xl text-center mb-12 text-gray-600 max-w-3xl mx-auto">
            Congratulations to all the students who have been selected for admission. View the list below, sorted by
            faculty and program.
          </p>
          <SelectedStudentsList />
        </div>
      </div>
      <Footer />
    </main>
  )
}

