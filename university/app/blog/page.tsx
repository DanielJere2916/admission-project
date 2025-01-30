import type { Metadata } from "next"
import Navbar from "../components/Navbar"
import Footer from "../components/Footer"
import BlogList from "../components/BlogList"
import FeaturedPost from "../components/FeaturedPost"

export const metadata: Metadata = {
  title: "Blog | University Admissions Portal",
  description: "Stay updated with the latest news, events, and insights from our university.",
}

export default function Blog() {
  return (
    <main className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
      <Navbar />
      <div className="pt-24 pb-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 className="text-5xl font-bold text-center mb-4 text-gray-800">University Blog</h1>
          <p className="text-xl text-center mb-12 text-gray-600 max-w-3xl mx-auto">
            Stay informed about campus life, academic achievements, and important announcements.
          </p>
          <FeaturedPost />
          <BlogList />
        </div>
      </div>
      <Footer />
    </main>
  )
}

