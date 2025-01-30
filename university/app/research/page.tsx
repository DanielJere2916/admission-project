import type { Metadata } from "next"
import Navbar from "../components/Navbar"
import Footer from "../components/Footer"
import ResearchHero from "../components/ResearchHero"
import StudentResearchProjects from "../components/StudentResearchProjects"

export const metadata: Metadata = {
  title: "Student Research Projects | University Admissions Portal",
  description: "Explore groundbreaking research projects conducted by our talented students.",
}

export default function Research() {
  return (
    <main className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      <Navbar />
      <ResearchHero />
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <StudentResearchProjects />
      </div>
      <Footer />
    </main>
  )
}

