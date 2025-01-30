import type { Metadata } from "next"
import Navbar from "../components/Navbar"
import Footer from "../components/Footer"
import ResearchHero from "../components/ResearchHero"
import ResearchAreas from "../components/ResearchAreas"
import FeaturedProjects from "../components/FeaturedProjects"
import ResearchFacilities from "../components/ResearchFacilities"

export const metadata: Metadata = {
  title: "Research Opportunities | University Admissions Portal",
  description: "Explore cutting-edge research opportunities and facilities at our university.",
}

export default function ResearchOpportunities() {
  return (
    <main className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      <Navbar />
      <ResearchHero />
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <ResearchAreas />
        <FeaturedProjects />
        <ResearchFacilities />
      </div>
      <Footer />
    </main>
  )
}

